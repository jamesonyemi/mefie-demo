<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Traits\SubscriptionTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Traits\ClientInformationTrait;
use App\Traits\VerifyPayStackPaymentTrait;
use App\Http\Requests\StoreCustomerRequest;
use App\Traits\CustomerAccountVerification;
use App\Traits\GoogleRecpatchaVerification;
use App\Notifications\CustomerAccountActivation;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ReceiveWebHookEventController;
use App\Http\Controllers\Repository\CustomerRepository;
use App\Http\Controllers\PaymentGate\PayStackPaymentSubscriptionProcess;


class ClientOnboarding extends Controller
{

    use CustomerAccountVerification;
    use ClientInformationTrait;
    use SubscriptionTrait;
    use VerifyPayStackPaymentTrait;
    use GoogleRecpatchaVerification;

    public function index()
    {
         return view('mefie_client_onboarding.welcome');
    }

    public function create(Request $get_subscription_type)
    {
        
        $pricing_plan   =   DB::table('pricing_plan')->select('*')  
                                 ->where("package_type", Crypt::decrypt($get_subscription_type->subscription_type))
                                 ->get()->first();
                                 
        return view('mefie_client_onboarding.form', compact("pricing_plan"));
        
    }

    public static function storeCustomerInfo(StoreCustomerRequest $request)
    {
        
        # code...
        $c      =   (static::getPricingData(Crypt::decrypt($request->pricing_plan_id))->cost);
        $t      =   (static::getPricingData(Crypt::decrypt($request->pricing_plan_id))->package_type);
        $cp     =   PayStackPaymentSubscriptionProcess::createPlan($t, $c, Request()->invoice_limit);
        $sc     =   PayStackPaymentSubscriptionProcess::createSubscription($cp->data->amount, $cp->data->plan_code);

       
        if ( !empty($cp) && !empty($sc) ) {

                CustomerRepository::createNewCustomer($request, $sc->data->reference );
                $pay    =   PayStackPaymentSubscriptionProcess::redirectToPayStackCheckOutPage($sc->data->authorization_url);
                return $pay;
                
            }
            else {
                abort(302, "authorized process");
            }


    }


    public function activateCustomerAccount($token)
    {
       

        $get_customer_token   =  static::getClientIdFromRequestUrl($token);
        abort_if( empty($get_customer_token), 403);

        static::updateCustomerInfo($token);
        static::updateNewClientDetails($get_customer_token->company_name, $get_customer_token->role_id, $token);

        $arrayList            =   explode(' ', $get_customer_token->company_name);
        $first_name           =   array_shift($arrayList);
        $last_name            =   implode(' ',$arrayList);
        $get_updated_info     =   $get_customer_token;
        $is_already_a_user    =   DB::table('users')->whereUserToken($token)->first();

        if ( !empty($is_already_a_user->email) )
        {
            return redirect()->route('being-here-before');
        }
        else{
            
            $get_client_details  =   DB::table("all_client_info")->where('targeted_client_id', $token)->first();
            static::copyCustomerDataIntoUserTable($first_name, $last_name, $get_updated_info, $get_client_details->id );
            return redirect()->route('successful-onboarding');

        }

    }

    protected static function updateCustomerInfo($customer_incoming_token)
    {
        $update_customer_activation_status    =   DB::table("customers")->where('token', $customer_incoming_token)->update([

            "is_account_activated" => true,
            "is_on_trial" => true,
            "date_of_account_activation" => Carbon::today(),
            "pricing_plan_expiry_date"   => Carbon::today()->addMonths(1),

          ]);

    }

    protected static function copyCustomerDataIntoUserTable($first_name, $last_name, $customerInfo, $id_from_all_client_info_table)
    {
        # code...

        $create_user  =  DB::table("users")->insertGetId([

          "first_name"      =>      $first_name,
          "last_name"       =>      $last_name,
          "full_name"       =>      $customerInfo->company_name,
          "role_id"         =>      $customerInfo->role_id,
          "ref_code"        =>      $customerInfo->reference_code,
          "email"           =>      $customerInfo->email,
          "password"        =>      $customerInfo->password,
          'verified'        =>      true,
          'tenant_id'       =>      $customerInfo->tenant_id,
          'created_by'      =>      $customerInfo->tenant_id,
          'user_token'      =>      $customerInfo->token,
          'clientid'        =>      $id_from_all_client_info_table,
          'pricing_plan_id'         => $customerInfo->pricing_plan_id,
          'account_activation_date' => $customerInfo->date_of_account_activation,
          'account_activation_expiry_date' => $customerInfo->pricing_plan_expiry_date,

      ]);

    }

    public function onboardingMessage()
    {
        # code...
        return view('partials.customer_onboarding')->with('success', 'One More Step!');
    }

    public function successfulOnboardingMessage()
    {
        # code...
        return view('partials.congrat_message')->with('congratulation_message', 'Congratulations');
    }

    public function beingHereBefore()
    {
        # code...
        return view('partials.being_here_before_message')->with('congratulation_message', 'Welcome Home');
    }
    
    protected static function recaptchaResponseData()
    {
         
        return [
            'recaptcha_status'      =>  static::recaptchaVerification()->success,
            'challenge_ts'          =>  static::recaptchaVerification()->challenge_ts,
            'recaptcha_hostname'    =>  static::recaptchaVerification()->hostname, 
        ];
        
    }
    
    protected static function recaptchaVerification()
    {
        
        $initilize_curl = curl_init();

        curl_setopt($initilize_curl, CURLOPT_URL, config('app.g_recaptcha_verify_site_url') );
        curl_setopt($initilize_curl, CURLOPT_HEADER, 0);
        curl_setopt($initilize_curl, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($initilize_curl, CURLOPT_POST, 1);
        
        $post_data = 
            [
                'secret'    =>  config('app.g_recaptcha_v2_secret'),
                'response'  =>  request()->input('g-recaptcha-response')
            ];
        
        curl_setopt($initilize_curl, CURLOPT_POSTFIELDS, $post_data);
        
        $response = json_decode(curl_exec($initilize_curl));
        
       
        curl_close($initilize_curl);
        
        return $response;
       
    }
    
    public static function customerEmailExist($incoming_email_id = '')
    {
        $data   =   DB::table('vw_user_email_collection')->select("email")
        ->where("email", $incoming_email_id )->get();
        return response()->json($data, 200);
        
    }
    

    public static function customerNameExist($customer_name = '')
    {
        $data   =   DB::table('customers')->select("company_name")
        ->where("company_name", $customer_name )->get();
        return response()->json($data, 200);
        
    }

}