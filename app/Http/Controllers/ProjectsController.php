<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProjectsController extends Controller {

	public function createProject()
    {
        return view('create-project.index');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

}
