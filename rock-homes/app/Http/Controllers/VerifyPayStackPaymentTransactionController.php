<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\ReceiveWebHookEventTrait;
use App\Traits\VerifyPayStackPaymentTrait as VerifyPaystackTransaction;

class VerifyPayStackPaymentTransactionController extends Controller
{
    //

    use ReceiveWebHookEventTrait;
    use VerifyPaystackTransaction;


    public static function verifyTransaction($reference_code)
    {
        # code...
        $response = static::responseData($reference_code);

        if( $response['data']['status'] == "success") {
            DB::table('paystack_cust')->insertGetId([
                'reference'     =>  $response['data']['reference'],
                'plan_code'     =>  $response['data']['plan_object']['plan_code'],
                'amount'        =>  $response['data']['amount'],
                'cust_email'    =>  $response['data']['customer']['email'],
                'cust_code'     =>  $response['data']['customer']['customer_code'],
            ]);
        } else {
            abort(302);
        }
       

    }

    public static function responseData($ref_id)
    {
        # code...
        return static::verify($ref_id);
    }

}
