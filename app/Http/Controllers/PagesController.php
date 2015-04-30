<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function viewProjects()
    {
        Mail::queue('emails.test', [], function($message)
        {
            $message->to('andreikainer@gmail.com', 'Andrei Kainer')->subject('Welcome to KuJ Crowdfunding!');
        });
        return view('projectpage');
    }

}
