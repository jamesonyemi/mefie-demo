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
        ddd($request);
        return static::receive();
    }
}
