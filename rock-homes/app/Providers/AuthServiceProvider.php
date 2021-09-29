<?php

namespace App\Providers;

use App\User;
use App\Traits\SubscriptionTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    
    use SubscriptionTrait;
    
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

        // define basic subscription plan
        Gate::define('isBasic', function($get_basic_plan) {
          
            $get_basic_plan    =   static::getCustomerSubscriptionPlan(); 

            return $get_basic_plan->package_type == 'basic';    

        });

        // define standard subscription plan
        Gate::define('isStandard', function($get_standard_plan) {

            $get_standard_plan    =   static::getCustomerSubscriptionPlan();

            return $get_standard_plan->package_type == 'standard';

        });

        // define professional subscription plan
        Gate::define('isProfessional', function($get_professional_plan) {

            $get_professional_plan    =   static::getCustomerSubscriptionPlan();

            return $get_professional_plan->package_type === 'professional';

        });

         // define professional subscription plan
         Gate::define('limited-subscription-package', function($plan) {

            $gs        =   DB::table('all_client_info')->whereCreatedByTenantId(\Auth::user()->tenant_id)->get();
            $plan      =   static::getCustomerSubscriptionPlan();

            return  ( ( (int) $plan->quota >= (int)count($gs) )   );

        });

        
    }
    

   

}
