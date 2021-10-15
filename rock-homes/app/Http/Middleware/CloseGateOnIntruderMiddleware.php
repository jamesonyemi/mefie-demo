<?php

namespace App\Http\Middleware;

use App\Traits\CloseGateOnIntruderTrait;

class CloseGateOnIntruderMiddleware
{

    use CloseGateOnIntruderTrait;
    
    public static function centralGateBootingStation() 
    {
       static::getAllGatesBootedUp();

    }

    public static function getAllGatesBootedUp()
    {
        # code...
        static::basicSubscriptionPlan();
        static::standardSubscriptionPlan();
        static::professionalSubscriptionPlan();
        static::limitedSubscriptionPlan(); 
        static::projectAllotedToEachClientOfAuthUserPerSubscritionPlan();
        
    }

}
