<?php namespace App\Exceptions;

use App\Http\Requests\Request;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Session;
use KuJ\CustomExceptions\InvalidConfirmationCodeException;
use KuJ\CustomExceptions\ProjectCompletedException;
use KuJ\CustomExceptions\UserHasCurrentLiveProjectException;
use KuJ\CustomExceptions\UserHasIncompleteProjectException;
use KuJ\CustomExceptions\UserRequiresAuthenticationException;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Handler extends ExceptionHandler {

	/**
	 * A list of the exception types that should not be reported.
	 *
	 * @var array
	 */
	protected $dontReport = [
		'Symfony\Component\HttpKernel\Exception\HttpException'
	];

	/**
	 * Report or log an exception.
	 *
	 * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
	 *
	 * @param  \Exception  $e
	 * @return void
	 */
	public function report(Exception $e)
	{
		return parent::report($e);
	}

	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Exception  $e
	 * @return \Illuminate\Http\Response
	 */
	public function render($request, Exception $e)
	{
        if ($e instanceof InvalidConfirmationCodeException)
        {
            Session::flash('flash_message', $e->getMessage());
            return redirect('/');
        }

        if ($e instanceof ProjectCompletedException)
        {
            Session::flash('flash_message', $e->getMessage());
            return redirect(LaravelLocalization::getCurrentLocale().'/'.trans('routes.create-project'));
        }

        if ($e instanceof UserRequiresAuthenticationException)
        {
            if($request->ajax() || $request->wantsJson())
            {
                return response()->json(['login' => '<i class="fa fa-exclamation-circle fa-lg"></i>'.trans('create-project-form.login')]);
            }
        }

        if ($e instanceof UserHasIncompleteProjectException)
        {
            if($request->ajax() || $request->wantsJson())
            {
                return response()->json(['incomplete' => '<i class="fa fa-exclamation-circle fa-lg"></i>'.trans('create-project-form.incomplete')]);
            }
        }

        if ($e instanceof UserHasCurrentLiveProjectException)
        {
            if($request->ajax() || $request->wantsJson())
            {
                return response()->json(['liveProject' => '<i class="fa fa-exclamation-circle fa-lg"></i>'.trans('create-project-form.live-project')]);
            }
        }

		return parent::render($request, $e);
	}

}
