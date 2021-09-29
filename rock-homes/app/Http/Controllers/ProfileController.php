<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function index()
    {

        return view('users.profile.index');
    }

    public static function fetchUserData(Request $request)
    {
        # code...
        // ddd($_POST);
        $updateData         =   request()->except(['_token', '_method', 'password_confirmation']);
        $update_user_info   =   DB::table('users')->where('id', Auth::user()->id)
                                        ->update(array_merge($updateData, static::userData($request)) );

        $isUpdated          =   ($update_user_info) ? 'User Info Updated Successfully' : 'No change made' ;
        
        return Redirect::back()->with('success', $isUpdated);


    }

    protected static function userData(Request $request): array
    {
        # code...

        $full_name   =   $request->first_name . " " . $request->middle_name . " " . $request->last_name;

        return [ 

            'full_name'     =>    $full_name, 
            'first_name'    =>    $request->first_name,
            'last_name'     =>    $request->last_name,
            'middle_name'   =>    $request->middle_name,
            'email'         =>    $request->email,
            'contact_details' =>  $request->contact_details,

        ];

    }



}
