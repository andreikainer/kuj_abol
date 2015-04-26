<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function createProject()
    {
        return view('create-project.index');
    }

    public function viewProject()
    {
        return view('projectpage');
    }

}
