<?php namespace App\Http\Controllers;

use App\Document;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\SaveProjectRequest;
use App\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Intervention\Image\Facades\Image;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use DB;
use KuJ\CustomExceptions\ProjectCompletedException;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ProjectsController extends Controller {

    /*
      * to show project tiles on landing page
      * to show sponsors' logos carousel
      */
    public function index()
    {
        $projects = Project::all()
            ->where('approved', 1)
            ->where('succ_funded', 0);

        $succ_projects = Project::where('succ_funded', 1)
            ->paginate(3);

        $logos = DB::table('sponsors_tbl')->get();

//        $logos = DB::table('users_tbl')
//                ->join('pledgers_tbl', function($join)
//                {
//                    $join->on('user_tbl.id', '=', 'pledgers_tbl.user_id');
//                })
//                ->where('user_tbl.business_name', '=', 1)
//                ->distinct()
//                ->select('users_tbl.avatar', 'users_tbl.business_name')
//                ->get();

        return view('pages.home', compact('projects', 'succ_projects', 'logos'));
    }

    /**
     * Show the Project view page. (BY ANDREI)
     *
     * @return project_tbl data, date, amount
     */
    public function show($slug)
    {
        // fetch data according to slug
        $project = Project::where('slug', $slug)->first();

        // convert DB date into european date format
        $finish_date = date("d-m-Y", strtotime($project->completed_on));

        // convert DB amounts into european currency format
        $amount_raised = number_format($project->amount_raised, 2, ',', '.');
        $target_amount = number_format($project->target_amount, 2, ',', '.');

        $galleryImages = \App\Image::where('project_id', $project->id)->get();

        //return $galleryImages;
        return view('pages.projectpage', compact('project', 'finish_date', 'amount_raised', 'target_amount', 'galleryImages'));
    }

    /**
     * Show the create-project page.
     *
     * @return \Illuminate\View\View
     */
    public function createProject()
    {
        $user = Auth::user();
        return view('create-project.index', compact('user'));
    }

    /**
     * Show the success page.
     *
     * @return \Illuminate\View\View
     */
    public function success()
    {
        return view('create-project.success');
    }

    /**
     * Save a complete Project in our system.
     *
     * @param CreateProjectRequest $request
     * @param null $projectName
     * @return string JSON response
     */
    public function store(CreateProjectRequest $request, $projectName = null)
    {
        $projectDetails = [
            'project_name'  => $request->get('project_name'),
            'short_desc'    => $request->get('short_desc'),
            'full_desc'     => $request->get('full_desc'),
            'target_amount' => $request->get('target_amount'),
            'child_name'    => $request->get('child_name'),
            'slug'          => strtolower(preg_replace('/[\s-]+/', '-', $request->get('project_name'))),
            'application_status' => 1, // completely entered
            'user_id'       => Auth::user()->id
        ];

        $userDocuments = [
            $request->file('doc_1_mand'),
            $request->file('doc_2_mand'),
            $request->file('doc_3'),
            $request->file('doc_4'),
            $request->file('doc_5'),
            $request->file('doc_6')
        ];

        $userImages = [
            'main_img'  => $request->file('main_img'),
            'img_2'     => $request->file('img_2'),
            'img_3'     => $request->file('img_3'),
            'img_4'     => $request->file('img_4')
        ];

        // Create the new Project.
        $project = Project::create($projectDetails);

        // Make the image and document directories.
        $imageFolderPath = public_path("img/$project->slug");
        $documentFolderPath = app_path("documents/$project->slug");

        $this->makeImageDirectories($imageFolderPath);
        $this->makeDocumentDirectory($documentFolderPath);

        // Create new Document instances in the database.
        // Move the documents to their directory.
        $this->moveDocumentsAndSaveToDB($userDocuments, $documentFolderPath, $project->id);

        // Resize the images to our needs, and save them in their directories.
        $this->resizeImagesAndSaveToFolders($userImages, $project->child_name, $imageFolderPath);


        // Create new Image instances in the database.
        $this->saveImageInstancesToDB($userImages, $project->child_name, $project->id);

        // Don't forget to email admin.
        // And update User model.

        return json_encode(['status' => 'success']);
    }

    /**
     * Save an incomplete state of a Project.
     *
     * @param SaveProjectRequest $request
     * @return string
     */
    public function save(SaveProjectRequest $request)
    {
        $projectDetails = [
            'project_name'  => $request->get('project_name'),
            'short_desc'    => $request->get('short_desc'),
            'full_desc'     => $request->get('full_desc'),
            'target_amount' => $request->get('target_amount'),
            'child_name'    => $request->get('child_name'),
            'slug'          => strtolower(preg_replace('/[\s-]+/', '-', $request->get('project_name'))),
            'user_id'       => Auth::user()->id
        ];

        $userDocuments = [
            $request->file('doc_1_mand'),
            $request->file('doc_2_mand'),
            $request->file('doc_3'),
            $request->file('doc_4'),
            $request->file('doc_5'),
            $request->file('doc_6')
        ];

        $userImages = [
            'main_img'  => $request->file('main_img'),
            'img_2'     => $request->file('img_2'),
            'img_3'     => $request->file('img_3'),
            'img_4'     => $request->file('img_4')
        ];

        // Lets just start here.
        $project = Project::create($projectDetails);

        // Make the image and document directories.
        $imageFolderPath = public_path("img/$project->slug");
        $documentFolderPath = app_path("documents/$project->slug");

        $this->makeImageDirectories($imageFolderPath);
        $this->makeDocumentDirectory($documentFolderPath);

        // Create new Document instances in the database.
        // Move the documents to their directory.
        $this->moveDocumentsAndSaveToDB($userDocuments, $documentFolderPath, $project->id);

        // Resize the images to our needs, and save them in their directories.
        $this->resizeImagesAndSaveToFolders($userImages, $project->child_name, $imageFolderPath);


        // Create new Image instances in the database.
        $this->saveImageInstancesToDB($userImages, $project->child_name, $project->id);

        // Update user model.

        return url(LaravelLocalization::getCurrentLocale().'/'.trans('routes.create-project/edit').'/'.$project->slug);
    }

    /**
     * Show the edit form, for a saved project.
     *
     * @param Project $project
     * @throws ProjectCompletedException
     * @return \Illuminate\View\View
     */
    public function edit(Project $project)
    {
        if( $project->application_status == 1)
        {
            throw new ProjectCompletedException(trans('create-project-form.project-complete'));
        }

        $project->load(['images', 'documents', 'mainImage']);
        $user = Auth::user();

        Session::flash('flash_message', trans('create-project-form.save-success'));
        return view('create-project.edit', compact('project', 'user'));
    }

    public function update(CreateProjectRequest $request, Project $project)
    {
        //
    }

    /**
     * Make the directories, for storing each sized images,
     * particular to a project.
     *
     * @param $path
     */
    public function makeImageDirectories($path)
    {
        if(! is_dir($path))
        {
            mkdir($path);
        }
        if(! is_dir($path.'/large'))
        {
            mkdir($path.'/large');
        }
        if(! is_dir($path.'/medium'))
        {
            mkdir($path.'/medium');
        }
        if(! is_dir($path.'/small'))
        {
            mkdir($path.'/small');
        }
    }

    /**
     * Make the directory for storing documents,
     * particular to a project.
     *
     * @param $path
     */
    public function makeDocumentDirectory($path)
    {
        if(! is_dir($path))
        {
            mkdir($path);
        }
    }

    /**
     * Create new Document instances in the DB,
     * Move the original file to document directory.
     *
     * @param $singleDimArr
     * @param $directoryPath
     * @param $projectID
     */
    public function moveDocumentsAndSaveToDB($singleDimArr, $directoryPath, $projectID)
    {
        foreach($singleDimArr as $file)
        {
            if( ! is_null($file))
            {
                Document::create(['filename' => preg_replace('/[\s]+/', '_', $file->getClientOriginalName()), 'project_id' => $projectID]);
                $file->move($directoryPath, preg_replace('/[\s]+/', '_', $file->getClientOriginalName()));
            }
        }
    }

    /**
     * Resize and rename the images to our formats.
     * Move them to their respective directories.
     *
     * @param $multiDimArr
     * @param $childName
     * @param $parentDirectoryPath
     */
    public function resizeImagesAndSaveToFolders($multiDimArr, $childName, $parentDirectoryPath)
    {
        $count = 1;
        foreach($multiDimArr as $key => $image)
        {
            if( ! is_null($image))
            {
                $extension = explode('.', $image->getClientOriginalName());
                $extension = $extension[count($extension)-1];
                $filename = (strtolower(preg_replace('/[\s]+/', '_', $childName).$count.'.'.$extension));

                Image::make($image)->resize(1250, 700, function($constraint)
                {
                    $constraint->upsize();
                    $constraint->aspectRatio();
                })->limitColors(255)
                    ->save($parentDirectoryPath.'/large/'.$filename);

                Image::make($image)->resize(992, 600, function($constraint)
                {
                    $constraint->upsize();
                    $constraint->aspectRatio();
                })->limitColors(255)
                    ->save($parentDirectoryPath.'/medium/'.$filename);

                Image::make($image)->resize(768, 500, function($constraint)
                {
                    $constraint->upsize();
                    $constraint->aspectRatio();
                })->limitColors(255)
                    ->save($parentDirectoryPath.'/small/'.$filename);

                $count++;
            }
        }
    }

    /**
     * Save an instance of an Image, to the DB.
     * Naming the filename in the same method, as those,
     * saved to the directories.
     *
     * @param $multiDimArr
     * @param $childName
     * @param $projectID
     */
    public function saveImageInstancesToDB($multiDimArr, $childName, $projectID)
    {
        $count = 1;
        foreach($multiDimArr as $key => $image)
        {
            if( ! is_null($image))
            {
                $extension = explode('.', $image->getClientOriginalName());
                $extension = $extension[count($extension)-1];
                $filename = (strtolower(preg_replace('/[\s]+/', '_', $childName).$count.'.'.$extension));

                if( $key != 'main_img')
                {
                    \App\Image::create([
                        'filename' => $filename,
                        'project_id' => $projectID
                    ]);
                }
                else
                {
                    \App\Image::create([
                        'filename' => $filename,
                        'project_id' => $projectID,
                        'main_img' => 1
                    ]);
                }

                $count++;
            }
        }
    }

    /*
    * to show current projects' tiles on separate page
    */
    public function showMoreProjects()
    {
        $projects = Project::where('approved', 1)
            ->where('succ_funded', 0)
            ->paginate(12);

        //$images = DB::table('images_tbl')->where('main_img', 1)->get();

        $tile_img = DB::table('images_tbl')
            ->where('main_img', '=', '1')
            ->join('projects_tbl', 'images_tbl.project_id', '=', 'projects_tbl.id')
            ->pluck('filename');

//        foreach($projects as $project)
//        {
//            $project_id = $project->id;
//            $tile_img = DB::table('images_tbl')
//                        ->where('project_id', $project_id)
//                        ->where('main_img', 1)
//                        ->list('filename');
//        }

        return view('pages.current-projects', compact('projects', 'tile_img'));
    }

    /*
     * to show successfully funded projects' tiles on separate page
     */
    public function showMoreSuccProjects()
    {
        $succ_projects = Project::where('succ_funded', 1)
            ->paginate(12);

        return view('pages.succ-projects', compact('succ_projects'));
    }
}