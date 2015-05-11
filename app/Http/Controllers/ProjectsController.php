<?php namespace App\Http\Controllers;

use App\Document;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProjectRequest;
use App\Project;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use DB;

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
        $logos = DB::table('sponsors_tbl')->get();



        // convert DB date into european date format
        $finish_date = date("d-m-Y", strtotime($project->completed_on));

        // convert DB amounts into european currency format
        $amount_raised = number_format($project->amount_raised, 2, ',', '.');
        $target_amount = number_format($project->target_amount, 2, ',', '.');

        $galleryImages = \App\Image::where('project_id', $project->id)->get();

        return view('pages.projectpage', compact('project', 'logos', 'finish_date', 'amount_raised', 'target_amount', 'galleryImages'));
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

    public function success()
    {
        return view('create-project.success');
    }

    public function store(CreateProjectRequest $request)
    {
        $projectDetails = [
            'project_name'  => $request->get('project_name'),
            'short_desc'    => $request->get('short_desc'),
            'full_desc'     => $request->get('full_desc'),
            'target_amount' => $request->get('target_amount'),
            'child_name'    => $request->get('child_name'),
            'slug'          => strtolower(preg_replace('/[\s-]+/', '-', $request->get('project_name'))),
            'application_status' => 1, // completely entered
            'user_id'       => 1 // Needs to be Auth::user->id()
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

        // Save the new Project.
        $project = Project::create($projectDetails);

        // Make the image and document directories.
        $imageFolderPath = public_path("img/$project->slug");
        $documentFolderPath = app_path("documents/$project->slug");

        if(! is_dir($imageFolderPath))
        {
            mkdir($imageFolderPath);
        }
        if(! is_dir($imageFolderPath.'/large'))
        {
            mkdir($imageFolderPath.'/large');
        }
        if(! is_dir($imageFolderPath.'/medium'))
        {
            mkdir($imageFolderPath.'/medium');
        }
        if(! is_dir($imageFolderPath.'/small'))
        {
            mkdir($imageFolderPath.'/small');
        }
        if(! is_dir($documentFolderPath))
        {
            mkdir($documentFolderPath);
        }

        // Create new Document instances.
        // Move the documents to their directory.
        foreach($userDocuments as $file)
        {
            if( ! is_null($file))
            {
                Document::create(['filename' => preg_replace('/[\s]+/', '_', $file->getClientOriginalName()), 'project_id' => $project->id]);
                $file->move($documentFolderPath, preg_replace('/[\s]+/', '_', $file->getClientOriginalName()));
            }
        }

        // Resize the images to our needs, and save them in their directories.
        $count = 1;
        foreach($userImages as $key => $image)
        {
            if( ! is_null($image))
            {
                $extension = explode('.', $image->getClientOriginalName());
                $extension = $extension[count($extension)-1];
                $filename = (strtolower(preg_replace('/[\s]+/', '_', $project->child_name).$count.'.'.$extension));

                Image::make($image)->resize(1250, 700, function($constraint)
                {
                    $constraint->upsize();
                    $constraint->aspectRatio();
                })->limitColors(255)
                    ->save($imageFolderPath.'/large/'.$filename);

                Image::make($image)->resize(992, 600, function($constraint)
                {
                    $constraint->upsize();
                    $constraint->aspectRatio();
                })->limitColors(255)
                    ->save($imageFolderPath.'/medium/'.$filename);

                Image::make($image)->resize(768, 500, function($constraint)
                {
                    $constraint->upsize();
                    $constraint->aspectRatio();
                })->limitColors(255)
                    ->save($imageFolderPath.'/small/'.$filename);

                $count++;
            }
        }


        // Create new Image instances.
        $count = 1;
        foreach($userImages as $key => $image)
        {
            if( ! is_null($image))
            {
                $extension = explode('.', $image->getClientOriginalName());
                $extension = $extension[count($extension)-1];
                $filename = (strtolower(preg_replace('/[\s]+/', '_', $project->child_name).$count.'.'.$extension));

                if( $key != 'main_img')
                {
                    \App\Image::create([
                        'filename' => $filename,
                        'project_id' => $project->id
                    ]);
                }
                else
                {
                    \App\Image::create([
                        'filename' => $filename,
                        'project_id' => $project->id,
                        'main_img' => 1
                    ]);
                }

                $count++;
            }
        }

        return json_encode(['status' => 'success']);
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