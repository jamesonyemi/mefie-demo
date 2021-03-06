<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ClientAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( Auth::check() )
        {
            // if user admin take him to his dashboard
            if ( Auth::user()->isAdmin() ) {
                 return redirect(route('home'));
            }

            // allow user to proceed with request
            else if ( Auth::user()->isClient() ) {
                 return $next($request);
            }
        }

        abort(403);  // for other user throw 404 error
    }
}
