<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ReceiveWebHookEventTrait;

class ReceiveWebHookEventController extends Controller
{
    //
    use ReceiveWebHookEventTrait;

    public static function receiveWebHookEvent()
    {
        # code...
       
        // Retrieve the request's body and parse it as JSON
        $input = @file_get_contents("php://input");
        
        $event = json_decode($input);
        
        // Do something with $event

        if($event->event == "subscription.create") {
            \DB::table('paystack_cust')->insertGetId([
                'plan_code'     =>  $event->data->customer->plan_code,
                'cust_email'    =>  $event->data->customer->plan_code,
                'cust_code'     =>  $event->data->plan->plan_code,
            ]);
        } else {
            abort(302);
        }
        
        http_response_code(200); // PHP 5.4 or greater
        
    }
}
