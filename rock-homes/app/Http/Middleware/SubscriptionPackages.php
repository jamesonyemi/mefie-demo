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
        
        if ( ! $request->user()->CustomerSubscriptionPackage($subscription_type) ) {
            # code...
            return redirect(route('home'));

        } elseif( $request->user()->CustomerSubscriptionPackage($subscription_type) === 'basic') {
            route('home');

        }

        return $next($request);
    }
}
