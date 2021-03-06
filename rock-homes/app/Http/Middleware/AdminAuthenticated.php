<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminAuthenticated
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
            // if user is not admin take him to his dashboard
            if ( Auth::user()->isClient() ) {
                 return redirect(route('client-dashboard'));
            }

            // allow admin to proceed with request
            else if ( Auth::user()->isAdmin() ) {
                 return $next($request);
            }
        }
        
        abort(404);  // for other user throw 404 error
    }
}
