<?php

namespace App\Traits;

use Illuminate\Support\Facades\Response;


trait VerifyPayStackPaymentTrait
{
    
    public static function verify($ref_code)
    {
        # code...
        return static::getTransactionVerificationData($ref_code);
    }


    private static function getTransactionVerificationData($reference_code)
    {
        # code...
        $curl = curl_init();
        curl_setopt_array($curl, array(

            CURLOPT_URL => "https://api.paystack.co/transaction/verify/${reference_code}",

            CURLOPT_RETURNTRANSFER => true,

            CURLOPT_ENCODING => "",

            CURLOPT_MAXREDIRS => 10,

            CURLOPT_TIMEOUT => 30,

            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

            CURLOPT_CUSTOMREQUEST => "GET",

            CURLOPT_HTTPHEADER => array(
                
            "Authorization: "."Bearer" ." " .config('paystack.secretKey'),
            "Cache-Control: no-cache",

            ),

        ));


        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        

        if ($err) {

            echo "cURL Error #:" . $err;

        } else {

           $data    =   $response;
           return json_decode($data, true); 

        }

    }
   

}