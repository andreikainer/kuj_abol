<?php namespace App\Http\Controllers;

use App\Favourite;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pledge;
use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\Pledger;
use App\Http\Requests\UserDetailsRequest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Auth\AuthController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Intervention\Image\Facades\Image;

class UserpanelController extends Controller
{
    /** Only allow auth user to access
     *
     */

    public function __construct()
    {

        $this->middleware('auth');          //check if the user is authorized
        $this->middleware('checkRoute');    // check if the user is authorized for this route

    }

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
     * Store a new favourite to DB.
     *
     * @return Response
     */
    public function addFavourite($projectId)
    {
        $userId = Session::get('userId');

        $favourite = new Favourite;
        $favourite->user_id = $userId;
        $favourite->project_id = $projectId;
        $favourite->save();

        return redirect()->back();
    }

    /**
     * Store a Favourite.
     *
     * @return Response
     */
    public function removeFavourite($projectId)
    {
        $favourite = Favourite::where('project_id', $projectId);
        $favourite->delete();

        return redirect()->back();
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
            $user = Auth::user()->with('projects')->where('user_name', $username)->firstOrFail();
        }

        catch (ModelNotFoundException $e)
        {
            return Redirect::home();
        }

        $contributions = Pledge::where('user_id', '=', $user->id)->get();

        $favourites = Favourite::with('project')->where('user_id', '=', $user->id)->get();

        if($user->id === 2)
        {
            return view('adminpanel.index', compact('user'));
        }

        return view('userpanel.index', compact('user', 'contributions', 'favourites'));

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
            'address'       => $request->get('address'),
            //'avatar'        => $request->file('avatar')
        ];

        // Update user info in DB
        $user = \Auth::user();
        foreach($userDetails as $attribute => $value)
        {
            $user->$attribute = $value;
        }
        $user->save();

        $avatar = $request->file('avatar');

        if($avatar !== null)
        {
            // Make the image and document directories.
            $imageFolderPath = public_path("img/avatars");

            // Resize the images to our needs, and save them in their directories.
            $this->resizeAvatarAndSave($avatar, $user->user_name, $imageFolderPath);

            // Create new Image instances in the database.
            $this->saveImageToDB($avatar, $user->user_name);

            Session::flash('flash_message', trans('userpanel.form-change-success'));
        }
        return redirect()->back();
    }

    protected function saveImageToDB($avatar, $userName)
    {

        // If $image is not an instance of a file, it is the hidden field value sent,
        // with a saved image preview.
        if($avatar instanceof UploadedFile)
        {
            $extension = explode('.', $avatar->getClientOriginalName());
            $extension = $extension[count($extension)-1];
            // Name images by user's name.
            $filename = (strtolower(preg_replace('/[\s]+/', '_', $userName).'.'.$extension));
        }
        else
        {
            $extension = explode('.', $avatar->getClientOriginalName());
            $extension = $extension[count($extension)-1];
            // Name images by user's name.
            $filename = (strtolower(preg_replace('/[\s]+/', '_', $userName).'.'.$extension));
        }

        $user = \Auth::user();
        $user->avatar = $filename;
        $user->save();
    }

    /**
     * Resize and rename the images to our formats.
     * Move them to their respective directories.
     *
     * @param $avatar
     * @param $userName
     * @param $avatarPath
     */
    protected function resizeAvatarAndSave($avatar, $userName, $avatarPath)
    {
        $extension = explode('.', $avatar->getClientOriginalName());
        $extension = $extension[count($extension) - 1];
        $filename = (strtolower(preg_replace('/[\s]+/', '_', $userName) . '.' . $extension));

        Image::make($avatar)->resize(250, 160, function ($constraint) {
            $constraint->upsize();
            $constraint->aspectRatio();
        })->limitColors(255)
            ->save($avatarPath.'/'.$filename);
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


    public function delete($id)
    {
        Session::put('deleted', trans('userpanel.form-delete-success'));

        $user = User::find($id);
        $user->active = 0;
        $user->save();
        return redirect('logout');
    }

}
