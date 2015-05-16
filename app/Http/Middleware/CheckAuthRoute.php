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
	public function handle($request, Closure $next, $route)
	{
//		$user = $request->user();
//
//        if

        dd($route);
	}

}
