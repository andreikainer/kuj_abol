<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Sponsor;
use App\Http\Requests\SponsorDetailsRequest;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Intervention\Image\Facades\Image;

use Illuminate\Http\Request;

class AdminpanelController extends Controller {

    /* remove the Sponsor - make inactive
     *
     */
	public function removeSponsor($sponsorId)
    {
        $sponsor = Sponsor::where('id', $sponsorId)->update(['active' => 0]);

        return redirect()->back();

    }

    /* relist the Sponsor - make aktive again
     *
     */
    public function relistSponsor($sponsorId)
    {
        $sponsor = Sponsor::where('id', $sponsorId)->update(['active' => 1]);

        return redirect()->back();
    }

    /* Add a new Sponsor with Logo
     *
     */

    public function addSponsor(SponsorDetailsRequest $request)
    {
        // Save the new Sponsor in the DB
        $sponsor = new Sponsor;
        $sponsor->business_name = $request->get('business_name');
        $sponsor->url           = $request->get('url');
        $sponsor->save();

        $logo = $request->file('logo');

        if($logo !== null)
        {
            // Make the image and document directories.
            $logoFolderPath = public_path("img/logos");

            // Resize the images to our needs, and save them in their directories.
            $this->resizeLogoAndSave($logo, $user->business_name, $logoFolderPath);

            // Create new Image instances in the database.
            $this->saveImageToDB($logo, $sponsor->business_name);

            Session::flash('flash_message', trans('userpanel.form-change-success'));
        }
        return redirect()->back();
    }

    protected function saveImageToDB($avatar, $userName)
    {

        // If $image is not an instance of a file, it is the hidden field value sent,
        // with a saved image preview.
        if($logo instanceof UploadedFile)
        {
            $extension = explode('.', $logo->getClientOriginalName());
            $extension = $extension[count($extension)-1];
            // Name images by user's name.
            $filename = (strtolower(preg_replace('/[\s]+/', '_', $userName).'.'.$extension));
        }
        else
        {
            $extension = explode('.', $logo->getClientOriginalName());
            $extension = $extension[count($extension)-1];
            // Name images by user's name.
            $filename = (strtolower(preg_replace('/[\s]+/', '_', $userName).'.'.$extension));
        }

        $sponsor = new Sponsor;
        $sponsor->logo = $filename;
        $sponsor->save();
    }

    /**
     * Resize and rename the images to our formats.
     * Move them to their respective directories.
     *
     * @param $avatar
     * @param $userName
     * @param $avatarPath
     */
    protected function resizeLogoAndSave($logo, $userName, $logoPath)
    {
        $extension = explode('.', $logo->getClientOriginalName());
        $extension = $extension[count($extension) - 1];
        $filename = (strtolower(preg_replace('/[\s]+/', '_', $userName) . '.' . $extension));

        Image::make($logo)->resize(250, 160, function ($constraint) {
            $constraint->upsize();
            $constraint->aspectRatio();
        })->limitColors(255)
            ->save($logoPath.'/'.$filename);
    }
}
