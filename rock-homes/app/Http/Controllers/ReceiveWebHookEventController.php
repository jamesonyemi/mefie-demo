<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ReceiveWebHookEventTrait;

class ReceiveWebHookEventController extends Controller
{
    //
    use ReceiveWebHookEventTrait;

    public static function receiveWebHookEvent(Request $request)
    {
        # code...

        ddd($request->ref);
         // Retrieve the request's body and parse it as JSON
         $input = @file_get_contents("php://input");
        
         $event = json_decode($input);
         
         // Do something with $event
         return $event;
         http_response_code(200); // PHP 5.4 or greater



        // ddd($request->input('data.customer.email'));
        // return static::receive();
    }
}
