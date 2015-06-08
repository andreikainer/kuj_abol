<?php namespace App\Http\Middleware;

use Closure;

class CheckAuthRoute
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // get the current user
        $username = $request->user()->user_name;

        // get the route he is trying to access
        $url = $request->url();
        //$urlRequest = substr($url, strrpos($url, '/') + 1);

        // check if he is allowed to access
        if (strpos($url,$username) !== false)
        {
            return $next($request);

        }else
        {
            return redirect()->home();
        }

    }
}
