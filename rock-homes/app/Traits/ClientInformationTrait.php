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
        
        DB::table('all_client_info')->where('targeted_client_id', $incoming_token_id)->update([
            
                        'targeted_client_id'        =>       static::openTokenGenerator(), 
                        'client_name'               =>       $client_name, 
                        'role_id'                   =>       $role_id, 
                        'created_by_tenant_id'      =>       static::openTokenGenerator(),
                        
                    ]
            );
        
    }

}