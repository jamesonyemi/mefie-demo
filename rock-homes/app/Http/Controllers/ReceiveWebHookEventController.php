<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\ReceiveWebHookEventTrait;
use App\Traits\VerifyPayStackPaymentTrait as VerifyTransaction;
use App\Http\Controllers\VerifyPayStackPaymentTransactionController as verifyPay;

class ReceiveWebHookEventController extends Controller
{
    //
    use ReceiveWebHookEventTrait;
    use VerifyTransaction;


    public static function receiveWebHookEvent(Request $reference_code)
    {
        # code...
        verifyPay::verifyTransaction($reference_code->input("reference"));
        return redirect()->route('customer-onboarding');
    }
    
}
