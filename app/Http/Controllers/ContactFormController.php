<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ContactFormController extends Controller {

    public function getContactForm()
    {
        return view('emails.help');
    }

    public function postContactForm(ContactFormRequest $request)
    {
        Mail::later(5, ['text' => 'view'],
        			    [
                            'name'          => $request->get('name'),
                            'email'         => $request->get('email'),
                            'message_body'  => $request->get('message_body')
                        ], function($message)
                        {
                            $message->from('noreply@kuj');
                            				$message->to('wilhelmine.bauer@sponsoring-agentur.at', 'Wilhemine Bauer')
		                    			      ->subject('from KuJ visitor');
                    });

		return \Redirect::route('contact')
			->with('message',  'Thanks for contacting us! Our staff will be back to you in 24 hours.');
    }
}
