<?php namespace App\Http\Controllers;

use App\Document;
use App\Favourite;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\SaveProjectRequest;
use App\Http\Requests\ShareViaEmailRequest;
use App\Http\Requests\StartProjectRequest;
use App\Project;
use App\Pledge;
use App\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Intervention\Image\Facades\Image;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use KuJ\CustomExceptions\ProjectCompletedException;
use KuJ\CustomExceptions\ProjectNameAlreadyTakenException;
use KuJ\CustomExceptions\UserAlreadyHasSubmittedProjectException;
use KuJ\CustomExceptions\UserHasCurrentLiveProjectException;
use KuJ\CustomExceptions\UserHasIncompleteProjectException;
use KuJ\CustomExceptions\UserNotOwnerOfProjectException;
use KuJ\CustomExceptions\UserRequiresAuthenticationException;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ProjectsController extends Controller {

    /*
      * to show project tiles on landing page
      * to show sponsors' logos carousel
      */
    public function index()
    {
        $allProjects = Project::where('approved', 1)
                    ->where('succ_funded', 0)
                    ->paginate(6);

        $projects = $allProjects->sortByDesc('completed_on');

        $dbSuccProjects = Project::where('succ_funded', 1)
            ->paginate(3);

        $succ_projects = $dbSuccProjects->sortByDesc('completed_on');

        $logos = Sponsor::where('active', 1)->where('online_until', '>', date('Y-m-d') )->get()->shuffle();

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
        $project = $slug;
        $logos = Sponsor::where('active', 1)->get();

        // find the Users Favourites and catch them
        $favourites = Favourite::all()->where('user_id', Session::get('userId'))->where('project_id', $project->id);
        //dd($favourites);

        // convert DB date into european date format
        $finish_date = date("d-m-Y", strtotime($project->completed_on));

        // convert DB amounts into european currency format
        $amount_raised = number_format($project->amount_raised, 2, ',', '.');
        $target_amount = number_format($project->target_amount, 2, ',', '.');

        $galleryImages = \App\Image::where('project_id', $project->id)->get();

        return view('pages.projectpage', compact('project', 'logos', 'finish_date', 'amount_raised', 'target_amount', 'galleryImages', 'favourites'));
    }

    /**
     * Email the user's friend, with a link to check out the project.
     *
     * @param ShareViaEmailRequest $request
     * @return string
     */
    public function shareProject(ShareViaEmailRequest $request)
    {
        $url = Session::get('_previous.url');
        $formDetails = $request->all();

        Mail::queue('emails.share-project', ['details' => $formDetails, 'url' => $url], function($message) use ($formDetails)
        {
            $message->to($formDetails['friend_email'], $formDetails['friend_name'])->subject($formDetails['sender_name'].' wants you to check out a project on kinderörderungen.at');
        });

        Session::flash('flash_message', 'Project shared successfully via email!');

        return json_encode($url);
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
     * Attempt to start a new project.
     *
     * @param StartProjectRequest $request
     * @return string
     * @throws UserAlreadyHasSubmittedProjectException
     * @throws UserHasCurrentLiveProjectException
     * @throws UserHasIncompleteProjectException
     * @throws UserRequiresAuthenticationException
     */
    public function start(StartProjectRequest $request)
    {
        if(is_null(Auth::user()))
        {
            throw new UserRequiresAuthenticationException;
        }

        if(! is_null(Auth::user()->incompleteProject->first()) )
        {
            throw new UserHasIncompleteProjectException;
        }

        if(! is_null(Auth::user()->submittedProject->first()))
        {
            throw new UserAlreadyHasSubmittedProjectException;
        }

        if(! is_null(Auth::user()->currentLiveProject->first()) )
        {
            throw new UserHasCurrentLiveProjectException;
        }

        return json_encode(['success' => 'success']);
    }

    /**
     * Save a complete Project in our system.
     *
     * @param CreateProjectRequest $request
     * @return string JSON response
     */
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
            'user_id'       => Auth::user()->id
        ];

        $userDetails = [
            'first_name'    => $request->get('first_name'),
            'last_name'     => $request->get('last_name'),
            'email'         => $request->get('email'),
            'tel_number'    => $request->get('tel_number'),
            'street'        => $request->get('street'),
            'postcode'      => $request->get('postcode'),
            'city'          => $request->get('city'),
            'country'       => $request->get('country')
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

        // Update user model.
        $user = Auth::user();
        foreach($userDetails as $attribute => $value)
        {
            $user->$attribute = $value;
        }
        $user->save();

        // Make the image and document directories.
        $imageFolderPath = public_path("img/$project->slug");
        $documentFolderPath = public_path("documents/$project->slug");

        $this->makeImageDirectories($imageFolderPath);
        $this->makeDocumentDirectory($documentFolderPath);

        // Create new Document instances in the database.
        // Move the documents to their directory.
        $this->moveDocumentsAndSaveToDB($userDocuments, $documentFolderPath, $project->id, $project->slug);

        // Resize the images to our needs, and save them in their directories.
        $this->resizeImagesAndSaveToFolders($userImages, $project->child_name, $imageFolderPath, $project->slug);


        // Create new Image instances in the database.
        $this->saveImageInstancesToDB($userImages, $project->child_name, $project->id);

        // Mail the administrator, of a newly submitted project.
        $project = Auth::user()->project;
        Mail::queue('emails.project-submit', ['project' => $project], function($message)
        {
            $message->to('andrei@kinderfoerderungen.at', 'Administrator')->subject(trans('project-submit-email.admin-title'));
        });

        // Mail the user, of a successful project submission.
        Mail::queue('emails.project-submit-user', ['project' => $project, 'user' => $user], function($message) use ($user)
        {
            $message->to($user->email, $user->first_name.' '.$user->last_name)->subject(trans('project-submit-email.user-title'));
        });

        return json_encode(['status' => 'success']);
    }

    /**
     * Save an incomplete state of a Project.
     *
     * @param SaveProjectRequest $request
     * @return string
     * @throws ProjectNameAlreadyTakenException
     */
    public function save(SaveProjectRequest $request)
    {
        $existingProject = Project::where('project_name', '=', $request->get('project_name'))->first();
        if(! is_null($existingProject) && $existingProject->user_id != Auth::user()->id)
        {
            throw new ProjectNameAlreadyTakenException;
        }

        $projectDetails = [
            'project_name'  => $request->get('project_name'),
            'short_desc'    => $request->get('short_desc'),
            'full_desc'     => $request->get('full_desc'),
            'target_amount' => $request->get('target_amount'),
            'child_name'    => $request->get('child_name'),
            'slug'          => strtolower(preg_replace('/[\s-]+/', '-', $request->get('project_name'))),
            'user_id'       => Auth::user()->id
        ];

        $userDetails = [
            'first_name'    => $request->get('first_name'),
            'last_name'     => $request->get('last_name'),
            'email'         => $request->get('email'),
            'tel_number'    => $request->get('tel_number'),
            'street'        => $request->get('street'),
            'postcode'      => $request->get('postcode'),
            'city'          => $request->get('city'),
            'country'       => $request->get('country')
        ];

        $userDocuments = [
            ($request->file('doc_1_mand')) ? $request->file('doc_1_mand') : $request->get('doc1Mand'),
            ($request->file('doc_2_mand')) ? $request->file('doc_2_mand') : $request->get('doc2Mand'),
            ($request->file('doc_3')) ? $request->file('doc_3') : $request->get('doc3'),
            ($request->file('doc_4')) ? $request->file('doc_4') : $request->get('doc4'),
            ($request->file('doc_5')) ? $request->file('doc_5') : $request->get('doc5'),
            ($request->file('doc_6')) ? $request->file('doc_6') : $request->get('doc6')
        ];

        $userImages = [
            'main_img'  => ($request->file('main_img')) ? $request->file('main_img') : $request->get('mainImage'),
            'img_2'     => ($request->file('img_2')) ? $request->file('img_2') : $request->get('img2'),
            'img_3'     => ($request->file('img_3')) ? $request->file('img_3') : $request->get('img3'),
            'img_4'     => ($request->file('img_4')) ? $request->file('img_4') : $request->get('img4')
        ];


        // Find the Project which belongs to the user, or create a new one.
        $projectID = (! is_null(Auth::user()->incompleteProject->first())) ? Auth::user()->incompleteProject->first()->id : null;

        $project = Project::findOrNew($projectID);

        // Store the original project slug,
        // for the saved images, in case of user edit.
        $originalProjectSlug = $project->slug;

        // Update or fill the Project attributes.
        foreach($projectDetails as $attribute => $value)
        {
            $project->$attribute = $value;
        }
        // Save the changes to the Project.
        $project->save();


        // Update user model.
        $user = Auth::user();
        foreach($userDetails as $attribute => $value)
        {
            $user->$attribute = $value;
        }
        $user->save();


        // Make the image and document directories.
        $imageFolderPath = public_path("img/$project->slug");
        $documentFolderPath = public_path("documents/$project->slug");

        $this->makeImageDirectories($imageFolderPath);
        $this->makeDocumentDirectory($documentFolderPath);

        // Create new Document instances in the database.
        // Move the documents to their directory.
        $this->moveDocumentsAndSaveToDB($userDocuments, $documentFolderPath, $project->id, $originalProjectSlug);

        // Resize the images to our needs, and save them in their directories.
        $this->resizeImagesAndSaveToFolders($userImages, $project->child_name, $imageFolderPath, $originalProjectSlug);

        // Create new Image instances in the database.
        $this->saveImageInstancesToDB($userImages, $project->child_name, $project->id);

        Session::flash('flash_message', trans('create-project-form.save-success'));
        return json_encode(['url' => url(LaravelLocalization::getCurrentLocale().'/'.trans('routes.create-project/edit').'/'.$project->slug)]);
    }

    /**
     * Show the edit form, for a saved project.
     *
     * @param Project $project
     * @throws UserRequiresAuthenticationException
     * @throws UserNotOwnerOfProjectException
     * @throws ProjectCompletedException
     * @return \Illuminate\View\View
     */
    public function edit(Project $project)
    {
        if( is_null(Auth::user()) )
        {
            throw new UserRequiresAuthenticationException(trans('create-project-form.not-authenticated'));
        }

        if( $project->user_id != Auth::user()->id )
        {
            throw new UserNotOwnerOfProjectException(trans('create-project-form.not-owner'));
        }

        if( $project->application_status == 1 )
        {
            throw new ProjectCompletedException(trans('create-project-form.project-complete'));
        }

        $project->load(['documents', 'mainImage', 'secondaryImages']);
        $user = Auth::user();

        return view('create-project.edit', compact('project', 'user'));
    }

    /**
     * Submit a completed, previously saved project.
     *
     * @param CreateProjectRequest $request
     * @param Project $project
     * @throws ProjectNameAlreadyTakenException
     * @return string
     */
    public function update(CreateProjectRequest $request, Project $project)
    {
        $existingProject = Project::where('project_name', '=', $request->get('project_name'))->first();
        if(! is_null($existingProject) && $existingProject->user_id != Auth::user()->id)
        {
            throw new ProjectNameAlreadyTakenException;
        }

        $projectDetails = [
            'project_name'  => $request->get('project_name'),
            'short_desc'    => $request->get('short_desc'),
            'full_desc'     => $request->get('full_desc'),
            'target_amount' => $request->get('target_amount'),
            'child_name'    => $request->get('child_name'),
            'slug'          => strtolower(preg_replace('/[\s-]+/', '-', $request->get('project_name'))),
            'application_status' => '1',
            'user_id'       => Auth::user()->id
        ];

        $userDetails = [
            'first_name'    => $request->get('first_name'),
            'last_name'     => $request->get('last_name'),
            'email'         => $request->get('email'),
            'tel_number'    => $request->get('tel_number'),
            'street'        => $request->get('street'),
            'postcode'      => $request->get('postcode'),
            'city'          => $request->get('city'),
            'country'       => $request->get('country')
        ];

        $userDocuments = [
            ($request->file('doc_1_mand')) ? $request->file('doc_1_mand') : $request->get('doc1Mand'),
            ($request->file('doc_2_mand')) ? $request->file('doc_2_mand') : $request->get('doc2Mand'),
            ($request->file('doc_3')) ? $request->file('doc_3') : $request->get('doc3'),
            ($request->file('doc_4')) ? $request->file('doc_4') : $request->get('doc4'),
            ($request->file('doc_5')) ? $request->file('doc_5') : $request->get('doc5'),
            ($request->file('doc_6')) ? $request->file('doc_6') : $request->get('doc6')
        ];

        $userImages = [
            'main_img'  => ($request->file('main_img')) ? $request->file('main_img') : $request->get('mainImage'),
            'img_2'     => ($request->file('img_2')) ? $request->file('img_2') : $request->get('img2'),
            'img_3'     => ($request->file('img_3')) ? $request->file('img_3') : $request->get('img3'),
            'img_4'     => ($request->file('img_4')) ? $request->file('img_4') : $request->get('img4')
        ];

        // Store the original project slug,
        // for the saved images, in case of user edit.
        $originalProjectSlug = $project->slug;

        // Update or fill the Project attributes.
        foreach($projectDetails as $attribute => $value)
        {
            $project->$attribute = $value;
        }
        // Save the changes to the Project.
        $project->save();

        // Update user model.
        $user = Auth::user();
        foreach($userDetails as $attribute => $value)
        {
            $user->$attribute = $value;
        }
        $user->save();

        // Make the image and document directories.
        $imageFolderPath = public_path("img/$project->slug");
        $documentFolderPath = public_path("documents/$project->slug");

        $this->makeImageDirectories($imageFolderPath);
        $this->makeDocumentDirectory($documentFolderPath);

        // Create new Document instances in the database.
        // Move the documents to their directory.
        $this->moveDocumentsAndSaveToDB($userDocuments, $documentFolderPath, $project->id, $originalProjectSlug);

        // Resize the images to our needs, and save them in their directories.
        $this->resizeImagesAndSaveToFolders($userImages, $project->child_name, $imageFolderPath, $originalProjectSlug);

        // Create new Image instances in the database.
        $this->saveImageInstancesToDB($userImages, $project->child_name, $project->id);

        // Mail the administrator, of a newly submitted project.
        $project = Auth::user()->project;
        Mail::queue('emails.project-submit', ['project' => $project], function($message)
        {
            $message->to('andrei@kinderfoerderungen.at', 'Administrator')->subject(trans('create-project-form.email-subject'));
        });

        // Mail the user, of a successful project submission.
        Mail::queue('emails.project-submit-user', ['project' => $project, 'user' => $user], function($message) use ($user)
        {
            $message->to($user->email, $user->first_name.' '.$user->last_name)->subject(trans('project-submit-email.user-title'));
        });

        return json_encode(['status' => 'success']);
    }

    /**
     * Delete the project entirely.
     *
     * @param Project $project
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete(Project $project)
    {
        // Delete the projects images.
        foreach($project->images as $image)
        {
            $image->delete();
        }

        // Delete the projects documents.
        foreach($project->documents as $document)
        {
            $document->delete();
        }

        // Delete the project.
        $project->delete();

        Session::flash('flash_message', trans('create-project-form.delete-success'));
        return redirect('create-project');
    }

    /**
     * Make the directories, for storing each sized images,
     * particular to a project.
     *
     * @param $path
     */
    protected function makeImageDirectories($path)
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
    protected function makeDocumentDirectory($path)
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
     * @param $originalProjectSlug
     */
    protected function moveDocumentsAndSaveToDB($singleDimArr, $directoryPath, $projectID, $originalProjectSlug)
    {
        foreach($singleDimArr as $file)
        {
            if( ! is_null($file) )
            {
                if($file instanceof UploadedFile)
                {
                    Document::create(['filename' => preg_replace('/[\s]+/', '_', $file->getClientOriginalName()), 'project_id' => $projectID]);
                    $file->move($directoryPath, preg_replace('/[\s]+/', '_', $file->getClientOriginalName()));
                }
                else {
                    // In the instance the user renames the project, move the saved documents to the new directory.
                    $originalDirectory = public_path('documents/'.$originalProjectSlug);
                    if(is_dir($originalDirectory))
                    {
                        $originalFile = file_get_contents($originalDirectory.'/'.$file);

                        file_put_contents($directoryPath.'/'.$file, $originalFile);
                    }
                }
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
     * @param $originalProjectSlug
     */
    protected function resizeImagesAndSaveToFolders($multiDimArr, $childName, $parentDirectoryPath, $originalProjectSlug)
    {
        $count = 1;
        foreach($multiDimArr as $key => $image)
        {
            if( ! is_null($image) )
            {
                // If $image is not an instance of a file, it is the hidden field value sent,
                // with a saved image preview.
                if( $image instanceof UploadedFile )
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
                }
                else
                {
                    // In the instance the user renames the project, move the already saved files to
                    // a new directory named by the new project name.
                    $originalFilename = $image;
                    $originalDirectory = public_path('img/'.$originalProjectSlug);
                    $extension = explode('.', $originalFilename);
                    $extension = $extension[count($extension)-1];
                    $newFilename = (strtolower(preg_replace('/[\s]+/', '_', $childName).$count.'.'.$extension));

                    if(is_dir($originalDirectory))
                    {
                        $smallImage = file_get_contents($originalDirectory.'/small/'.$originalFilename);
                        file_put_contents($parentDirectoryPath.'/small/'.$newFilename, $smallImage);

                        $mediumImage = file_get_contents($originalDirectory.'/medium/'.$originalFilename);
                        file_put_contents($parentDirectoryPath.'/medium/'.$newFilename, $mediumImage);

                        $largeImage = file_get_contents($originalDirectory.'/large/'.$originalFilename);
                        file_put_contents($parentDirectoryPath.'/large/'.$newFilename, $largeImage);
                    }
                }
            }

            $count++;
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
    protected function saveImageInstancesToDB($multiDimArr, $childName, $projectID)
    {
        $count = 1;
        foreach($multiDimArr as $key => $image)
        {
            if( ! is_null($image))
            {
                // If $image is not an instance of a file, it is the hidden field value sent,
                // with a saved image preview.
                if($image instanceof UploadedFile)
                {
                    $extension = explode('.', $image->getClientOriginalName());
                    $extension = $extension[count($extension)-1];
                    // Name images by child's name.
                    $filename = (strtolower(preg_replace('/[\s]+/', '_', $childName).$count.'.'.$extension));
                }
                else
                {
                    $extension = explode('.', $image);
                    $extension = $extension[count($extension)-1];
                    // Name images by current value of child's name.
                    $filename = (strtolower(preg_replace('/[\s]+/', '_', $childName).$count.'.'.$extension));
                }

                if( $key != 'main_img')
                {
                    // Protect against the instance where, the user alters the child name field.
                    $image = \App\Image::where('filename', 'LIKE', '%'.$count.'%')
                        ->where('project_id', '=', $projectID)
                        ->get()
                        ->first();
                    if (is_null($image))
                    {
                        \App\Image::create([
                            'filename'      => $filename,
                            'project_id'    => $projectID
                        ]);
                    }
                    else
                    {
                        $image->filename = $filename;
                        $image->project_id = $projectID;
                        $image->save();
                    }
                }
                else
                {
                    // Protect against the instance where, the user alters the child name field.
                    $image = \App\Image::where('filename', 'LIKE', '%'.$count.'%')
                        ->where('project_id', '=', $projectID)
                        ->get()
                        ->first();
                    if (is_null($image))
                    {
                        \App\Image::create([
                            'filename'      => $filename,
                            'project_id'    => $projectID,
                            'main_img'      => '1'
                        ]);
                    }
                    else
                    {
                        $image->filename = $filename;
                        $image->project_id = $projectID;
                        $image->main_img = '1';
                        $image->save();
                    }
                }
            }

            $count++;
        }
    }

    /*
    * to show current projects' tiles on separate page
    */
    public function showMoreProjects()
    {
        $currentProjects = Project::where('approved', 1)
            ->where('succ_funded', 0)
            ->get();

        $projects = $currentProjects->sortByDesc('completed_on');

        return view('pages.current-projects', compact('projects'));
    }

    /*
     * to show successfully funded projects' tiles on separate page
     */
    public function showMoreSuccProjects()
    {
        $dbSuccProjects = Project::where('succ_funded', 1)->get();

        $succ_projects = $dbSuccProjects->sortByDesc('completed_on');

        return view('pages.succ-projects', compact('succ_projects'));
    }
}
