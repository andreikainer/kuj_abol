<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProjectRequest;
use App\Project;

class ProjectsController extends Controller {

	public function createProject()
    {
        return view('create-project.index');
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
            'application_status' => 1,
            'user_id'       => 1 // Needs to be Auth::user->id()
        ];

        $project = Project::create($projectDetails);

        return $project;
    }

}
