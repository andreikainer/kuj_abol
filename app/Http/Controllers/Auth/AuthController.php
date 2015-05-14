<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use KuJ\CustomExceptions\InvalidConfirmationCodeException;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use URL;


class AuthController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard  $auth
     * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
     * @return void
     */
    public function __construct(Guard $auth, Registrar $registrar)
    {
        $this->auth = $auth;
        $this->registrar = $registrar;

        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        return view('account.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        $validator = $this->registrar->validator($request->all());

        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user = $this->registrar->create($request->all());

        Mail::queue('emails.verify', ['user' => $user], function($message) use ($user)
        {
            $message->to($user->email, $user->first_name.' '.$user->last_name)->subject(trans('register-page.subject'));
        });

        Session::flash('flash_message', trans('register-page.flash-1'));
        return redirect()->back();
    }

    /**
     * Verify the user's account, via confirmation link.
     *
     * @param $confirmation_code
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws InvalidConfirmationCodeException
     */
    public function getVerify($confirmation_code = null)
    {
        if (! $confirmation_code)
        {
            throw new InvalidConfirmationCodeException(trans('register-page.flash-2'));
        }

        $user = User::whereConfirmationCode($confirmation_code);

        if (! $user instanceof User)
        {
            throw new InvalidConfirmationCodeException(trans('register-page.flash-3'));
        }

        $user->confirmation_code = null;
        $user->active = 1;
        $user->save();

        Session::flash('flash_message', trans('register-page.flash-4'));
        return redirect('/');
    }

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        // store the url of the prev page in a session
        Session::put('curr-url', URL::previous());

        return view('account.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        // 1. create rules for user’s input
        $this->validate($request, [
            'user_name' => 'required',
            'password' => 'required|min:6',
        ]);

        // 2. run the validation with those rules
        $credentials = $request->only('user_name', 'password');

        // 3a. if user’s input passed validation
        if ($this->auth->attempt($credentials, $request->has('remember')))
        {
            // 4. check if the user has been baned
            if($this->auth->user()->active == 1)
            {
                $username = $this->auth->user()->user_name;

                // 5. store success feed back message in a session
                Session::flash('flash_message', trans('login-page.login-success'));
                Session::set('username', $username);

                // 6. redirect the user to the prev page
                return redirect(Session::get('curr-url'));

                // 7. clean up the session
                \Session::forget('curr-url');

            }else{
                // 5. if the user has been baned, store feed back message in a session
                Session::flash('flash_message', trans('login-page.baned-user'));
                // 6. logout banned user
                $this->auth->logout();
                // 7. redirect back to login form
                return redirect()->back();
            }

        } else {
            // 3b. if user’s input didn’t pass validation, show the login form again, this time with pre-filled email input field and with error message
            return redirect($this->loginPath())
                ->withInput($request->only('user_name', 'remember'))
                ->withErrors([
                    'user_name' => $this->getFailedLoginMessage(),
                ]);
        }

    }

    /**
     * Get the failed login message.
     *
     * @return string
     */
    protected function getFailedLoginMessage()
    {
        return trans('login-page.login-fail');
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        $this->auth->logout();

        // store success feed back message in a session
        if(Session::has('deleted'))
        {
            Session::flash('flash_message', Session::get('deleted'));
        }else{
            Session::flash('flash_message', trans('login-page.logout'));
        }

        // clear user_id key in session
        Session::forget('username');

        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : LaravelLocalization::getCurrentLocale().'/'.(trans('routes.account/login')));
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (property_exists($this, 'redirectPath'))
        {
            return $this->redirectPath;
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
    }

    /**
     * Get the path to the login route.
     *
     * @return string
     */
    public function loginPath()
    {
        return property_exists($this, 'loginPath') ? $this->loginPath : trans('routes.account/login');
    }

}
