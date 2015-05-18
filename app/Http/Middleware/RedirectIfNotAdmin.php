<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdmin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        $user = Auth::user();

        // If the user is not logged in, redirect to home page.
        if(is_null($user))
        {
            return redirect()->home();
        }

        // If the user is not our administrator, redirect to home page.
        if($user->id != '2')
        {
            return redirect()->home();
        }

		return $next($request);
	}

}
