<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ReceiveWebHookEventTrait;
use App\Traits\VerifyPayStackPaymentTrait as VerifyTransaction;

class ReceiveWebHookEventController extends Controller
{
    //
    use ReceiveWebHookEventTrait;
    use VerifyTransaction;


    public static function receiveWebHookEvent($ref)
    {
        # code...
        
        $response = static::verify($ref);
        
        // Do something with $response

        if($response->data->status == "success") {
            \DB::table('paystack_cust')->insertGetId([
                'plan_code'     =>  $response->data->plan_object->plan_code,
                'cust_email'    =>  $response->data->customer->email,
                'cust_code'     =>  $response->data->customer->customer_code,
            ]);
        } else {
            abort(302);
        }
        
        http_response_code(200); // PHP 5.4 or greater

    }
}
