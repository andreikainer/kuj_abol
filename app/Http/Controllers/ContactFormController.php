<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ContactFormController extends Controller {

    public function getContactForm()
    {
        return view('pages.contact');
    }

    public function postContactForm(ContactFormRequest $request)
    {
        Mail::send('emails.help',
        			    [
                            'name'          => $request->get('name'),
                            'email'         => $request->get('email'),
                            'message_body'  => $request->get('message_body')
                        ], function($message)
                        {
//                          $message->to('wilhelmine.bauer@sponsoring-agentur.at', 'Wilhemine Bauer')
//		                    			      ->subject('from KuJ visitor');
                            $message->to('ladiez.os@gmail.com', 'Wilhemine Bauer');
                    });
    // store success feed back message in a session
        Session::set('message_success', trans('contact-page.thanks'));

        return view('pages.contact');
    }
}
