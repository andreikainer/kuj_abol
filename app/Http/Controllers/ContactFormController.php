<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ContactFormController extends Controller {

    public function getContactForm($address, $addressee)
    {
        //return view('contact-form', compact('addressee'));
        return view('pages.contact', compact('address', 'addressee'));
    }

    public function postContactForm(ContactFormRequest $request, $address, $addressee)
    {
        $toWhere    = $address;
        $toWhom     = $addressee;
        //$toWhom = $request->get($addressee);

        Mail::send('emails.help',
        			    [
                            'name'          => $request->get('name'),
                            'email'         => $request->get('email'),
                            'message_body'  => $request->get('message_body')
                        ], $toWhere, $toWhom, function($message) use ($toWhere, $toWhom)
                        {
//                          $message->to('wilhelmine.bauer@sponsoring-agentur.at', 'Wilhemine Bauer')
//		                    			      ->subject('from KuJ visitor');
                            $message->to($toWhere, $toWhom);
                    });
    // store success feed back message in a session
        Session::set('message_success', trans('contact-page.thanks'));

        return view('pages.contact');
    }
}
