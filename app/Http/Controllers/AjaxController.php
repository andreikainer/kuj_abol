<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AjaxController extends Controller {

	public function tempDocument(Request $request)
    {
        $inputElement = $request->get('element');
        $file = $request->file('file');

        $filename = strtotime('now').'_'.$file->getClientOriginalName();

        $file->move(public_path('temp'), $filename);

        $publicPath = public_path('temp/'.$filename);

        return json_encode(['element' => $inputElement, 'path' => $publicPath]);
    }

    public function getLocale(Request $request)
    {
        $locale = explode('/', $request->server('HTTP_REFERER'));
        return $locale[3];
    }


}
