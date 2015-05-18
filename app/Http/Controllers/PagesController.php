<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Sponsor;

class PagesController extends Controller {

/*-- How It Works Page --*/
    public function howItWorks()
    {
        return view('pages.how-it-works');
    }

/*-- Sponsors Page --*/
    public function sponsors()
    {
        $logos = Sponsor::all()->where('active', 1);
        return view('pages.sponsors', compact('logos'));
    }

/*-- ABOL Page --*/
    public function abol()
    {
        return view('pages.abol');
    }

}
