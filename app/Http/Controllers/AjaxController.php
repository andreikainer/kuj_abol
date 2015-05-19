<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\AjaxTempDocumentRequest;
use Illuminate\Http\Request;

class AjaxController extends Controller {

    /**
     * Upload a user's document, for preview.
     *
     * @param AjaxTempDocumentRequest $request
     * @return string
     */
    public function tempDocument(AjaxTempDocumentRequest $request)
    {
        $inputElement = $request->get('element');
        $elementName = $request->get('name');
        $file = $request->file($elementName);

        $filename = strtotime('now').'_'.$file->getClientOriginalName();

        $file->move(public_path('temp'), $filename);

        $publicPath = public_path('temp/'.$filename);

        return json_encode(['element' => $inputElement, 'path' => $publicPath]);
    }

    /**
     * Get the current locale prefix of the route.
     *
     * @param Request $request
     * @return mixed
     */
    public function getLocale(Request $request)
    {
        $locale = explode('/', $request->server('HTTP_REFERER'));
        return $locale[3];
    }

}
