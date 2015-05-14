<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\Pledger;
use App\Http\Requests\UserDetailsRequest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Redirect;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Auth\AuthController;

class UserpanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param $username
     * @internal param int $id
     * @return Response
     */
    public function show($username)
    {
        try
        {
            $user = User::with('projects')->where('user_name', $username)->firstOrFail();
        }

        catch (ModelNotFoundException $e)
        {
            return Redirect::home();
        }

        return view('userpanel.index', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(UserDetailsRequest $request)
    {
        $userDetails = [
            'user_name'     => $request->get('user_name'),
            'email'         => $request->get('email'),
            'first_name'    => $request->get('first_name'),
            'last_name'     => $request->get('last_name'),
            'business_name' => $request->get('business_name'),
            'tel_number'    => $request->get('tel_number'),
            'address'       => $request->get('address')
        ];

        $userImages = [
            'avatar'  => $request->file('avatar'),
        ];

        // Update user info in DB
        $user = \Auth::user();
        foreach($userDetails as $attribute => $value)
        {
            $user->$attribute = $value;
        }
        $user->save();

        //$imageFolderPath = public_path("img/avatars/$user");
        Session::flash('flash_message', trans('userpanel.form-change-success'));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function favourite()
    {
        return 'this is it';
    }

    public function delete($id)
    {
        Session::put('deleted', trans('userpanel.form-delete-success'));

        $user = User::find($id);
        $user->active = 0;
        $user->save();
        return redirect('logout');
    }

}
