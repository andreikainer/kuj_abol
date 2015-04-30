<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AjaxController extends Controller {

	public function tempDocument(Request $request)
    {
        $inputElement = $request->get('element');
        $filename = $request->get('filename');
        $document = $request->get('data');

        $data_index = strpos($document, 'base64')+7;
        $document_data = substr($document, $data_index, strlen($document));

        $decoded_document = base64_decode($document_data);

        $path = public_path('temp/'.strtotime('now').$filename);

        $new_document = fopen($path, "wb");
        fwrite($new_document, $decoded_document);
        fclose($new_document);

        return json_encode(['element' => $inputElement, 'path' => $path]);
    }

}
