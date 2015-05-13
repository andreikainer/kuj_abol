<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UserCMSController extends Controller {

    public function index($username)
    {
        if (\Auth::check())
        {
            return view('user-cms.profile-page');
        }
        return 'hui';

    }

}
