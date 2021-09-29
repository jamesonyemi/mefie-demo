<?php

namespace App\Traits;

trait GoogleRecpatchaVerification

{
    
    public static function verifyGoogleRecaptcha($recaptcha_hidden_field): object
    {
        
        # code...
        $url            =   config('app.g_recaptcha_site_key');
        $data           =   static::googleRequiredRecaptchaParams($recaptcha_hidden_field);
        $options        =   static::googleOptionalRecaptchaParams($data);

        $context        =   stream_context_create($options);
        $result         =   file_get_contents($url, false, $context);
        $resultInJson   =   json_decode($result);

        if ($resultInJson->success !== true) 
        {
            return back()->with('message', 'Captcha Error');
        }  

    }


    private static function googleOptionalRecaptchaParams($data = ''):array
    {
        $options    =   [
            'http'  => [
                'header'    => 'Content-type: application/x-www-form-urlencoded\r\n',
                'method'    =>  'POST',
                'content'   =>  http_build_query($data),
            ],
        ];
    }


    private static function googleRequiredRecaptchaParams($captcha_hidden_form_field = ''):array
    {
        $data   =   [
            'secret'    =>  config('app.g_recaptcha_v2_site_key'),
            'response'  =>  $captcha_hidden_form_field,

        ];
    }

}