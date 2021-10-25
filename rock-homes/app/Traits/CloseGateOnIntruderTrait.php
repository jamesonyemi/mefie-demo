<?php

namespace App\Traits;
use App\User;
use App\Traits\SubscriptionTrait;
use App\Traits\ProjectTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

trait CloseGateOnIntruderTrait
{
   
    use SubscriptionTrait, ProjectTrait;

   
    # List of Gates

    public static function basicSubscriptionPlan()
    {
        
        # define basic subscription plan ...
        Gate::define('isBasic', function($get_basic_plan) {

            static::setSubscriptionPackageToBasicIfEmpty();
            $get_basic_plan    =   static::getCustomerSubscriptionPlan(); 

            return $get_basic_plan->package_type == 'basic';    

        });

    }

    public static function standardSubscriptionPlan()
    {
       
        # define standard subscription plan ...
        Gate::define('isStandard', function($get_standard_plan) {

            static::setSubscriptionPackageToBasicIfEmpty();
            $get_standard_plan    =   static::getCustomerSubscriptionPlan();

            return $get_standard_plan->package_type == 'standard';

        });
    }

    public static function professionalSubscriptionPlan()
    {
        
        # define professional subscription plan ...
        Gate::define('isProfessional', function($get_professional_plan) {

            static::setSubscriptionPackageToBasicIfEmpty();
           $get_professional_plan    =   static::getCustomerSubscriptionPlan();

           return $get_professional_plan->package_type === 'professional';

       });

    }

    public static function limitedSubscriptionPlan()
    {

        # define limited subscription package...
        Gate::define('limited-subscription-package', function($plan) {

            $gs        =   DB::table('all_client_info')->whereCreatedByTenantId(\Auth::user()->tenant_id)->get();
            $plan      =   static::getCustomerSubscriptionPlan();

            return  ( ( (int) $plan->quota >= (int)count($gs) )   );

        });
    }

    public static function projectAllotedToEachClientOfAuthUserPerSubscritionPlan()
    {
        
        # Number of projects alloted to each client of the Authenticated User for a given subscription plan...
        Gate::define('project-per-client', function($current_subscription_plan) {

            $auth_client_projects         =   static::pluckAllClientIdBelongingToAuthUser();
            $current_subscription_plan    =   static::getCustomerSubscriptionPlan();

            return  ( ( (int)count($auth_client_projects) ) === ( (int) $current_subscription_plan->quota )  );

        });
    }

    

}