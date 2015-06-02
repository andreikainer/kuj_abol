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
        $logos = Sponsor::where('active', 1)->where('top_sponsor', 0)->get();
        $top_sponsors = Sponsor::where('active', 1)->where('top_sponsor', 1)->get();
        return view('pages.sponsors', compact('logos', 'top_sponsors'));
    }

/*-- ABOL Page --*/
    public function abol()
    {
        return view('pages.abol');
    }

    /*-- Imprint Page --*/
    public function imprint()
    {
        return view('pages.imprint');
    }

}
