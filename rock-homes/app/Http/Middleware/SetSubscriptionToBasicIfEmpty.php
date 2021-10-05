<?php

namespace App\Http\Middleware;

use Closure;
use App\Traits\SubscriptionTrait;
use Illuminate\Support\Facades\Auth;


class SetSubscriptionToBasicIfEmpty
{
   
   use SubscriptionTrait;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    public function handle($request, Closure $next, $guard = null)
    {
        
        $response = $next($request);

        if ( Auth::guard($guard)->check() && empty(Auth::user()->pricing_plan_id) ) {
            # code...
           static::setSubscriptionPackageToBasicIfEmpty();

        } 
        
        return $response;
    }

}
