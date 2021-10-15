<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait ProjectTrait
{
   public static function getAllProjectBelongingToAuthUser(): void
   {
       
    # code...
       $getAllProjects  = DB::table('all_client_info')
            ->join('tblproject', 'tblproject.clientid', '=', 'all_client_info.id')
            ->join("users as c", "c.clientid", "=", "all_client_info.id" )
            ->join('tbltown', 'tbltown.tid', '=', 'tblproject.tid')
            ->join('tblstatus', 'tblstatus.id','=', 'tblproject.statusid')
            ->join('tblregion', 'tblregion.rid', '=', 'tblproject.rid')
            ->select('tblproject.rid as region_id', 'tblregion.region', 'tbltown.tid as location_id', 'all_client_info.id as clientid',
                        'tbltown.town as location', 'tblproject.title as project_title', 'c.created_by', 'all_client_info.targeted_client_id', 'tblproject.pid', 'all_client_info.client_name', 'tblstatus.status as client_project_status', 'tblstatus.id as client_project_status_id')
            ->orderBy('tblproject.pid')->where('tblproject.active', '=', 'yes')
            ->where("all_client_info.created_by_tenant_id", \Auth::user()->created_by)
            ->where("all_client_info.created_by_tenant_id", "<>", null)
            ->groupBy('tblproject.clientid')
            ->get()->toArray();
           
   }

   public static function pluckAllClientIdBelongingToAuthUser()
   {
       
    # code...
      return DB::table('all_client_info')
            ->join('tblproject', 'tblproject.clientid', '=', 'all_client_info.id')
            ->join("users as c", "c.clientid", "=", "all_client_info.id" )
            ->where("all_client_info.created_by_tenant_id", \Auth::user()->created_by)
            ->pluck("tblproject.clientid")->toArray();
            
   }
    
}