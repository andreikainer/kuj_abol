<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

/*-- Home Page --*/
    public function index()
    {
        return view('pages.home');
    }

/*-- How It Works Page --*/
    public function howItWorks()
    {
        return view('pages.how-it-works');
    }

    public function createProject()
    {
        return view('create-project.index');
    }

}
