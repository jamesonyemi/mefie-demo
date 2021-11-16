<?php

namespace App\Traits;

use App\Traits\EncryptData;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

trait ClientInformationTrait
{
   
    use EncryptData;

    public static function updateNewClientDetails($client_name, $role_id, $incoming_token_id): void
    {
        
        DB::table('all_client_info')->updateOrInsert(
                     
            [   'targeted_client_id' => static::getClientIdFromRequestUrl($incoming_token_id)->token  ],

            [
    
                'targeted_client_id'        =>       static::getClientIdFromRequestUrl($incoming_token_id)->token, 
                'client_name'               =>       static::getClientIdFromRequestUrl($incoming_token_id)->company_name, 
                'role_id'                   =>       static::getClientIdFromRequestUrl($incoming_token_id)->role_id, 
                'created_by_tenant_id'      =>       static::getClientIdFromRequestUrl($incoming_token_id)->token,
                
            ]
        );
        
    }


    public static function getClientIdFromRequestUrl($token)
    {
        # code...
        return DB::table("customers")->where('token', $token)->first();
    }

}