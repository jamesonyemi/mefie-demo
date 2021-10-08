<?php

namespace App\Traits;

trait SubscriptionTrait
{
    
    public static function getCustomerSubscriptionPlan()
    {
        
        return \DB::table('pricing_plan')->select("*")
                    ->where( "pricing_id" , "<>", null )
                    ->wherePricingId( \Auth::user()->pricing_plan_id  )
                    ->first();
                    
    }

    public static function getSubscriptionType($subscription_type)
    {
        # code...
        $get_subscription_type  =   \DB::table('pricing_plan')->select("*")
                    ->wherePackageType($subscription_type)->first();
                        
        return $get_subscription_type;
        
    }

    public static function setSubscriptionPackageToBasicIfEmpty():void
    {
        # code...
        \DB::table('users')->whereId(\Auth::user()->id)
            ->where('pricing_plan_id', '=', null)
            ->update(array_merge(['pricing_plan_id' => 1]));
        
    }

}