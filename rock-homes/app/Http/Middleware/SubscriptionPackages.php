<?php

namespace App\Http\Middleware;

use Closure;

class SubscriptionPackages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $subscription_type)
    {

        
        if ( !$request->user()->CustomerSubscriptionPackage($subscription_type)->package_type 
                    ||  $request->user()->CustomerSubscriptionPackage($subscription_type)->package_type == 'basic' ) {
            # code...
           abort(403, "not authorized");

        } 

        return $next($request);
    }
}
