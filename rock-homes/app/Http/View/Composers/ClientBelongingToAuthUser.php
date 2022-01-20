<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ClientBelongingToAuthUser
{

  public function compose(View $view)
  {
    # code...
    $view->with('clients', $this->clientArray());
    
  }

  protected function clientArray()
  {
    
    if ( Auth::check() ) {
      # code...
      return DB::table('vw_active_client_project')->where('created_by_tenant_id', Auth::user()->tenant_id )
              ->where('created_by_tenant_id', "<>",  null )->get();
    }
  }

}