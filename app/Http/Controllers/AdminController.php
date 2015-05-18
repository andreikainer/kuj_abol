<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\AdminEditProjectRequest;
use App\Project;
use Illuminate\Http\Request;

class AdminController extends Controller {

    /**
     * Only the administrator can access these routes.
     */
    public function __construct()
    {
        $this->middleware('checkAdmin');
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

    public function patchEditProject(AdminEditProjectRequest $request, Project $project)
    {
        // Update the Project, if the Admin has altered the content.
        $project->project_name = $request->get('project_name');
        $project->short_desc = $request->get('short_desc');
        $project->full_desc = $request->get('full_desc');
        $project->target_amount = $request->get('target_amount');
        $project->child_name = $request->get('child_name');

        // Approve the project, and make it live.
        $project->approved = '1';
        $project->live = '1';
    }

    public function getApproveProject(Request $request, Project $project)
    {
        dd($project);
    }

}
