<?php

namespace App\Providers;

use App\User;
use App\Traits\ProjectTrait;
use App\Traits\SubscriptionTrait;
use App\Traits\CloseGateOnIntruderTrait;
use App\Http\Middleware\CloseGateOnIntruderMiddleware;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
   
    use CloseGateOnIntruderTrait;
    
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        CloseGateOnIntruderMiddleware::centralGateBootingStation();
      
        
    }
    
   

}
