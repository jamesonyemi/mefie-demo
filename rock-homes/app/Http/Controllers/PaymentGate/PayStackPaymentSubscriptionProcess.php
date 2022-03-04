<?php

namespace App\Http\Controllers\PaymentGate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class PayStackPaymentSubscriptionProcess extends Controller
{
    //
    public static function createPlan( $type, $amt, $invoice_limit )
    {
        # code...
        $curl = curl_init();

    curl_setopt_array($curl, array(

    CURLOPT_URL => "https://api.paystack.co/plan",

    CURLOPT_RETURNTRANSFER => true,

    CURLOPT_ENCODING => "",

    CURLOPT_MAXREDIRS => 10,

    CURLOPT_TIMEOUT => 30,

    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

    CURLOPT_CUSTOMREQUEST => "POST",

    CURLOPT_POSTFIELDS =>  [

      "name"            =>    $type,
      "interval"        =>    "monthly",
      "amount"          =>    static::computeAmount($amt),
      "invoice_limit"   =>    $invoice_limit,

    ],

    CURLOPT_HTTPHEADER => array(

      "Authorization: "."Bearer" ." " .config('paystack.secretKey'),
      "Cache-Control: no-cache"

    ),

  ));

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {

            echo "cURL Error #:" . $err;

        } else {

            $data = json_decode($response);
            return $data;
           
        }

    }

    public static function createSubscription($amt, $plan_code)
    {
        # code...
        $url = "https://api.paystack.co/transaction/initialize";

        $fields = [

            'email'     => "jamesonyemi@gmail.com",
            'amount'    => $amt,
            'plan'      => $plan_code,

        ];

        $fields_string = http_build_query($fields);

        //open connection

        $ch = curl_init();

  

  //set the url, number of POST vars, POST data

        curl_setopt($ch,CURLOPT_URL, $url);

        curl_setopt($ch,CURLOPT_POST, true);

        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(

            "Authorization: "."Bearer" ." " .config('paystack.secretKey'),
            "Cache-Control: no-cache",

        ));

        

        //So that curl_exec returns the contents of the cURL; rather than echoing it

        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 


        //execute post

        $result = curl_exec($ch);

        return json_decode($result);
       

    }

    public static function ListOnPaymentSubscriptionEvents()
    {
        # code...
        // Retrieve the request's body and parse it as JSON

        $input = @file_get_contents("php://input");

        $event = json_decode($input);
        
        // Do something with $event
        
        http_response_code(200); // PHP 5.4 or greater
        return $event;
        
    }


    public static function redirectToPayStackCheckOutPage($url)
    {
        # code...
        if( !empty($url) ) {

            return Redirect::to($url);
        }

        throw new Exception("invalid url", 1);
        
    }
   
    public static function computeAmount($amt)
    {
        # code...
        return  (floatval($amt) * 100);
    }
    
}
