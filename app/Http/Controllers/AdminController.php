<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests\AdminEditProjectRequest;
use App\Http\Requests\SponsorDetailsRequest;
use App\Project;
use App\User;
use Carbon\Carbon;
use App\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Validator;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Intervention\Image\Facades\Image;


class AdminController extends Controller {

    /**
     * Only the administrator can access these routes.
     */
    public function __construct()
    {
        $this->middleware('checkAdmin');
    }

    /**
     * Show the Administrator panel.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        try
        {
            $user = Auth::user()->with('projects')->where('id', '=', '2')->firstOrFail();
        }
        catch (ModelNotFoundException $e)
        {
            return Redirect::home();
        }

        // if it's admin, redirect to admin cms with all users but admin
        $allUsers = User::whereNotIn('id', [2])->get();
        $allSponsors = Sponsor::all();

        // Retrieve all projects pending approval.
        $pendingProjects = Project::where('approved', '=', '0')
            ->where('application_status', '=', '1')
            ->where('live', '=', '0')->get();

        return view('adminpanel.index', compact('user', 'allUsers', 'pendingProjects', 'allSponsors'));
    }

    /**
     * Display the submitted project to the administrator.
     *
     * @param Request $request
     * @param Project $project
     * @return \Illuminate\View\View
     */
    public function getEditProject(Request $request, Project $project)
    {
        return view('adminpanel.view-edit-project', compact('project'));
    }

    /**
     * Approve the project, whilst updating any changes the Administrator has made.
     *
     * @param AdminEditProjectRequest $request
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function patchEditProject(AdminEditProjectRequest $request, Project $project)
    {
        $originalChildName = $project->child_name;
        $originalSlug = $project->slug;

        // Update the Project, if the Admin has altered the content.
        $project->update($request->all());

        // Update the slug, if altered.
        $project->slug = strtolower(preg_replace('/[\s-]+/', '-', $request->get('project_name')));

        // Approve the project, and make it live.
        $project->approved = '1';
        $project->live = '1';

        // Set the time for project to end.
        $date = Carbon::now();
        $date->day = $date->day + 60;

        $project->completed_on = $date->toDateString();

        $project->save();

        // If the Administrator renames the project, we need new directories.
        $this->makeDocumentDirectory(public_path('documents/'.$project->slug));
        $this->makeImageDirectories(public_path('img/'.$project->slug));

        // In the instance the Administrator amends the child's name, project name, or both
        // Rename and move the project's images, move the project's documents.
        if($project->child_name != $originalChildName || $project->slug != $originalSlug)
        {
            for($i = 0; $i < count($project->images); $i++)
            {
                $extension = explode('.', $project->images[$i]->filename);
                $extension = $extension[count($extension)-1];
                $filename = strtolower(preg_replace('/[\s]+/', '_', $project->child_name)).($i+1).'.'.$extension;
                $orginalDirectory = public_path('img/'.$originalSlug);
                $newDirectory = public_path('img/'.$project->slug);

                // Small image.
                $image = file_get_contents($orginalDirectory.'/small/'.$project->images[$i]->filename);
                file_put_contents($newDirectory.'/small/'.$filename, $image);
                // Medium image.
                $image = file_get_contents($orginalDirectory.'/medium/'.$project->images[$i]->filename);
                file_put_contents($newDirectory.'/medium/'.$filename, $image);
                // Large image.
                $image = file_get_contents($orginalDirectory.'/large/'.$project->images[$i]->filename);
                file_put_contents($newDirectory.'/large/'.$filename, $image);

                // Update the Image Model.
                $project->images[$i]->filename = $filename;
                $project->images[$i]->save();
            }

            // Move the documents.
            foreach($project->documents as $document)
            {
                $file = file_get_contents(public_path('documents/'.$originalSlug.'/'.$document->filename));

                file_put_contents(public_path('documents/'.$project->slug.'/'.$document->filename), $file);
            }
        }

        // Redirect to Admin panel.
        Session::flash('flash_message', trans('adminpanel.approved-message'));
        return redirect('admin');
    }

    /**
     * Approve the pending project.
     *
     * @param Request $request
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getApproveProject(Request $request, Project $project)
    {
        // Approve the project.
        $project->approved = '1';
        $project->live = '1';

        // Set the time for project to end.
        $date = Carbon::now();
        $date->day = $date->day + 60;

        $project->completed_on = $date->toDateString();

        $project->save();

        // Redirect to Admin panel.
        Session::flash('flash_message', trans('adminpanel.approved-message'));
        return redirect('admin');
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

    /* remove the Sponsor - make inactive
     *
     */
    public function removeSponsor($sponsorId)
    {
        $sponsor = Sponsor::where('id', $sponsorId)->update(['active' => 0]);

        return redirect()->back();

    }

    /* relist the Sponsor - make aktive again
     *
     */
    public function relistSponsor($sponsorId)
    {
        $sponsor = Sponsor::where('id', $sponsorId)->update(['active' => 1]);

        return redirect()->back();
    }

    /* Add a new Sponsor with Logo
     *
     */

    public function addSponsor(SponsorDetailsRequest $request)
    {

        // Save the new Sponsor Logo in the DB
        $sponsor = new Sponsor;
        $sponsor->user_id = 1;
        $sponsor->business_name = $request->get('business_name');
        $sponsor->url           = $request->get('url');
        $sponsor->online_since  = date('Y-m-d');
        $sponsor->save();

        $logo = $request->file('logo');

        if($logo !== null)
        {
            // Make the image and document directories.
            $logoFolderPath = public_path("img/logos");

            // Resize the images to our needs, and save them in their directories.
            $this->resizeLogoAndSave($logo, $sponsor->business_name, $logoFolderPath);

            // Create new Image instances in the database.
            $this->saveImageToDB($logo, $sponsor->business_name, $sponsor);

            Session::flash('flash_message', trans('userpanel.logo-upload-success'));
        }
        return redirect()->back();
    }

    protected function saveImageToDB($logo, $businessName, $sponsor)
    {

        // If $logo is not an instance of a file, it is the hidden field value sent,
        // with a saved image preview.
        if($logo instanceof UploadedFile)
        {
            $extension = explode('.', $logo->getClientOriginalName());
            $extension = $extension[count($extension)-1];
            // Name images by business's name.
            $filename = (strtolower(preg_replace('/[\s]+/', '_', $businessName).'.'.$extension));
        }
        else
        {
            $extension = explode('.', $logo->getClientOriginalName());
            $extension = $extension[count($extension)-1];
            // Name images by business name.
            $filename = (strtolower(preg_replace('/[\s]+/', '_', $businessName).'.'.$extension));
        }

        $sponsor->logo = $filename;
        $sponsor->save();
    }

    /**
     * Resize and rename the logos to our formats.
     * Move them to their respective directories.
     *
     * @param $logo
     * @param $businessName
     * @param $logoPath
     */
    protected function resizeLogoAndSave($logo, $businessName, $logoPath)
    {
        $extension = explode('.', $logo->getClientOriginalName());
        $extension = $extension[count($extension) - 1];
        $filename = (strtolower(preg_replace('/[\s]+/', '_', $businessName) . '.' . $extension));

        Image::make($logo)->resize(250, 160, function ($constraint) {
            $constraint->upsize();
            $constraint->aspectRatio();
        })->limitColors(255)
            ->save($logoPath.'/'.$filename);
    }

}
