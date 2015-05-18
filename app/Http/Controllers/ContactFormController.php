<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ContactFormController extends Controller {

    public function getContactForm(Request $request)
    {
        // if there are http-requests, store them in session
        $address = $request->input("address");
        $addressee = $request->input("addressee");

        Session::set('address', $address);
        Session::set('addressee', $addressee);

        return view('pages.contact');
    }

    public function postContactForm(ContactFormRequest $request)
    {
        $data ='';
        // 1a. if there are stored parameters in session, use them as email address and addressee for mail function
        if(Session::has('address') && Session::has('addressee'))
        {

            $data = array('toWhere' => Session::get('address'),
                           'toWhom' => Session::get('addressee'));

            // 2. clear address and addressee keys in session
            Session::forget('address');
            Session::forget('addressee');
        }else{
        // 1b. if there are no stored parameters in session, use the defaults for mail function
            $data = array('toWhere' => 'wilhelmine.bauer@sponsoring-agentur.at',
                           'toWhom' => 'Wilhemine Bauer');
        }

        // 2. send the email
        Mail::send('emails.help',
        			    [
                            'name'          => $request->get('name'),
                            'email'         => $request->get('email'),
                            'message_body'  => $request->get('message_body'),
                            'data'          => $data
                        ], function($message) use ($data)
                        {
                            $message->to($data['toWhere'], $data['toWhom'])->subject(trans('contact-page.question'));
                    });

        // 3. store success feed back message in a session
        Session::flash('flash_message', trans('contact-page.thanks'));

        // 4redirect back to the contact form
        return view('pages.contact');
    }

    public function postNewsletter(Request $request)
    {
        // 1. filter user's input
        $user_input = $request->input('email');
        $user_email = filter_var($user_input, FILTER_VALIDATE_EMAIL);

        // 2. send email to the user
        Mail::send('emails.newsletter',
            [
                'email' => $request->get('email')
            ], function($message) use ($user_email)
            {
                $message->to($user_email)->subject(trans('contact-page.newsletter-success'));
            });

        // 3. send email to the admin
        Mail::send('emails.new-newsletter-user',
            [
                'email'      => $request->get('email'),
                'user_email' => $user_email
            ], function($message) use ($user_email)
            {
                $message->to('ladiez.os@gmail.com', $user_email)->subject(trans('contact-page.new-newsletter-user'));
            });

        // 4. store success feed back message in a session
        Session::flash('flash_message', trans('contact-page.flash'));

        // 5. redirect back to the contact form
        return redirect()->back();
    }
}
