<?php namespace App\Http\Middleware;

use Closure;

class CheckAuthRoute {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        $username = $request->user()->user_name;

        $url = $request->url();
        $urlRequest = substr($url, strrpos($url, '/') + 1);

        if($username !== $urlRequest)
        {
            return redirect()->home();
        }

        return $next($request);
	}

}
