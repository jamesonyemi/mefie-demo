<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\OnsiteVisitFileUploadController;
use Illuminate\Support\Facades\Input;

use App\Traits\UploadFiles;


class OnsiteVisitController extends Controller
{

   
    private static $relativePath  =  '/project-documents/';
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        
        $count_projects  =  DB::table('vw_count_group_project_belonging_to_client')
                                    ->where('created_by_tenant_id', Auth::user()->tenant_id)->get();
                                    
        $get_projects       =  DB::table("tblproject as a")
                                    ->join("all_client_info as b", "b.id", "=", "a.clientid" )
                                    ->select("a.title as project_name", "a.pid", "a.clientid", "b.created_by_tenant_id")
                                    ->where('b.created_by_tenant_id', Auth::user()->tenant_id)
                                    ->distinct()->get();
      
        return view('onsite_visit.list_and_count_project', compact('count_projects', 'get_projects') );
        
    }
    
    public function listAndCountProject($cid)
    {
        
        $decrypt_cid                        =   PaymentController::decryptedId($cid);
        $filter_count_on_project_visited    =   static::filterQueryCountOnVisit($decrypt_cid);
        $get_client_name                    =   DB::table('vw_count_group_project_belonging_to_client')->select("client_name")
                                                    ->where('clientid', $decrypt_cid)
                                                    ->where('created_by_tenant_id', Auth::user()->tenant_id)->first();

        return view('onsite_visit.index', compact('filter_count_on_project_visited', 'get_client_name'));

    }
    
    public static function filterQueryCountOnVisit($get_client_id)
    {
        
        $onsite = DB::table('vw_onsite_visit')
                ->whereExists(function($query) use($get_client_id) {
                    $query->select(DB::raw("$get_client_id"))
                    ->from('vw_project_visit_count')
                    ->whereCreatedByTenantId(Auth::user()->created_by)->where('clientid', $get_client_id)
                    ->whereColumn('vw_project_visit_count.clientid', 'vw_onsite_visit.clientid');
                });
                                
         return $onsite->join('vw_project_visit_count', 'vw_project_visit_count.clientid', '=', 'vw_onsite_visit.clientid')
                        ->select("vw_onsite_visit.*", "vw_project_visit_count.visited")
                        ->where('vw_onsite_visit.clientid', $get_client_id)
                        ->whereCreatedByTenantId(Auth::user()->created_by)->groupBy("vw_onsite_visit.pid")->get();
                                
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $genders         = DB::table('tblgender')->pluck('id', 'type');
        $regions         = DB::table('tblregion')->pluck('region', 'rid');
        $regionId        = DB::table('tblregion')->get()->pluck('rid', 'region');
        $townId          = DB::table('tbltown')->get()->pluck('tid', 'town');
        $project_status  = DB::table('tblstatus')->get()->pluck('id', 'status');
        $project_visited = DB::table('tblproject')->get()->pluck('pid', 'title')->sort();

        return view('onsite_visit.create', compact('genders', 'townId','regions', 'regionId', 'project_status', 'project_visited'));
        
    }

    public function clientToProject($id)
    {
        $clientProject =  DB::table("tblproject")->where("clientid",$id)->pluck("title","pid");
        return json_encode($clientProject);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        # code...
        static::validator($request->img_name);
        $img_name     =   $request->hasFile('img_name');
        $exceptData   =   request()->except(['_token', '_method', 'img_name', 'base64img_encode', 'clientid','pid']);

        $postData     =   [ 'vdate'    => $request->input('vdate'), 'vtime'    => date("h:i:s"), 'vnumber'  => uniqid(),
                            'status'   => $request->input('status'),
                            'comments' => !empty($request->input('comments')) ?  trim(strip_tags($request->input('comments'))) : '',
                        ];

        if ( $img_name ) {

            $destinationPath   =  public_path() . static::$relativePath;
            $files             =  $request->file('img_name');   // will get all files

            //this statement will loop through all files.
            foreach ($files as $file) {

                $file_name           =  date("Y-m-d h_i_s")."_".$file->getClientOriginalName();
                $b64imageEncoded     =  base64_encode($file_name);
                $full_path           =  $file->move($destinationPath, $file_name);    //move files to destination folder
                $fileNamesInArray[]  =  $file_name;
                $base64img_encode[]  =  $b64imageEncoded;
                $ImagePathInArray[]  =  static::$relativePath.$file_name;

            }

            $save_visit             =  DB::table('tblvisit')->insertGetId(array_merge($exceptData, $postData));

            $lastInsertedRowOnVisit =  DB::table('tblvisit')->latest('vid')->first();
            $Id                     =  $lastInsertedRowOnVisit->vid;
            $vId                    =  $lastInsertedRowOnVisit->vid;
            $statusId               =  $lastInsertedRowOnVisit->status;

            $generateVnumber        =  ['vnumber' => static::generateUniqueCode($vId)];
            $updateVnumber          =  DB::table('tblvisit')->where('vid', $Id )->update($generateVnumber);

            $projectImgSaveOnvisit  =  DB::table('tblprojectimage')->insertGetId(array_merge(
                request()->except(['_token', '_method','vdate', 'comments','status',]),
                [
                    'img_name'         => json_encode($fileNamesInArray),
                    'img_path'         => json_encode($ImagePathInArray),
                    'base64img_encode' => json_encode($base64img_encode),
                    'vid'              => $save_visit,
                    'status_id'        => $statusId,
                    ]));

        }

        $flashMessage   =   'Visit #' . "\n" . $projectImgSaveOnvisit . ' Created Sucessfully';
        return redirect()->route('onsite-visit.index')->with('success', $flashMessage);


    }

    public static function generateUniqueCode($vnumber)
    {
        return '#' . str_pad($vnumber, 8, "0", STR_PAD_LEFT);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id                 =  PaymentController::decryptedId($id);
        $onsiteVisit        =  DB::table('vw_onsite_visit');
        $getAllVisit        =  $onsiteVisit->where('vid', $id)->get();
        $project_owner      =  $onsiteVisit->where('pid', $id)
                                    ->select('full_name', 'project_name', 'project_location', 'pid')->first();

        $projects           =  DB::table('tblproject')->get();
        return view('onsite_visit.view', compact('getAllVisit', 'projects', 'project_owner' ));
    }
    
    public function allProjectsByClient($projectid, $incoming_client_id)
    {
        # code...
        $project_id      =  PaymentController::decryptedId($projectid);
        $query_params    =  [
                ['pid',  '=', PaymentController::decryptedId($projectid)],
                ['clientid', '=',  PaymentController::decryptedId($incoming_client_id)],
            ];
        
        $projects        =  DB::table('vw_onsite_visit')->where($query_params);
        
        $projectOwners   =  DB::table('tblproject')->where($query_params)->get();
        $clientId        =  DB::table('tblproject')->where($query_params)->select('clientid')->first();
        
        $client_info     =  DB::table('all_client_info')->where('id', $clientId->clientid)->select('client_name')->first();
            
        return view('onsite_visit.project_owned_by_client', compact('projectOwners', 'client_info') );

    }
    
    public function allVisits($project_id)
    {
        # code...
        $decrypt_client_id      =  PaymentController::decryptedId($project_id);
        $getClientVisits        =  DB::table('vw_onsite_visit')->where('pid', $decrypt_client_id)->get();
        $project_belongs_to     =  DB::table('vw_onsite_visit')->where('pid', $decrypt_client_id)->first(); 
        return view('onsite_visit.all_visits', compact('getClientVisits', 'project_belongs_to') );

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($pid, $vid)
    {
        
        $onsiteVisit            =   DB::table('vw_onsite_visit');
        
        $incoming_query_params  =   $this->getQueryParams( 'pid', '=', PaymentController::decryptedId($pid));
        $incoming_vid           =   $this->getQueryParams( 'vid', '=', PaymentController::decryptedId($vid));
        
        $getAllVisit            =  $onsiteVisit->where($incoming_query_params, $incoming_vid)->get();
        $project_owner          =  $onsiteVisit->where($incoming_query_params, $incoming_vid )
                                                ->select('full_name', 'project_name',  'project_location' , 'pid', 'img_name', 'img_path', 'vid')->first();
        /**
        * get the clientid
        * execute a select statement to retrieve all images belonging to a guven client
        */
        

        return view('onsite_visit.edit', compact('getAllVisit', 'project_owner' ));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        static::validator($request->img_name);
        $id             =   PaymentController::decryptedId($id);
        $files          =   $request->file('img_name');
        $comments       =   $request->input('comments');
        $date_of_visit  =   $request->input('vdate');
        $exceptData     =   request()->except(['_token', '_method', 'img_name', 'base64img_encode', 'clientid','pid']);
        $onsiteVisit    =   DB::table('tblvisit');
        $directory      =   public_path() . static::$relativePath;
        
        $update_visit   =   $onsiteVisit->where('vid', $id)->update( array_merge($exceptData,['comments' => trim(strip_tags($comments)) ]) );
        
        foreach ($files as $file) {
    
                    $file_name           =  date("Y-m-d h_i_s")."_".$file->getClientOriginalName();
                    $b64imageEncoded     =  base64_encode($file_name);
                    $full_path           =  $file->move($directory, $file_name);  
                    $fileNamesInArray[]  =  $file_name;
                    $base64img_encode[]  =  $b64imageEncoded;
                    $ImagePathInArray[]  =  static::$relativePath.$file_name;
    
                }
            
            
        $update_project_image   =     DB::table('tblprojectimage')->where('vid', $id)->update(
                    [
                        'img_name' => json_encode($fileNamesInArray),
                        'img_path' =>  json_encode($ImagePathInArray),
                        'base64img_encode' =>  json_encode($base64img_encode),
                        'vid' => $id
                    ]
                    
                );       
    
        $isUpdated      =   ($update_visit || $update_project_image ) ? 'Data had been Updated' : 'No change made';
        
        return redirect()->route('onsite-visit.index')->with('success', $isUpdated);


    }
    
    public function getQueryParams( $column, $operator, $query_string): array
    {
        # code...
        return [ [ $column,  $operator, $query_string ] ];
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public static function deleteProjectImage($id, $img)
    {
    
    
        try {

            # code...
            $removeImageFromArrayList  =   static::updateImageList($id, $img);
            $removeImageFromFolder     =   static::deleteImageFromFolder($img);
                return redirect()->route('onsite-visit.index')->with('success', 'Thank you, image deleted successfully');

            }
            catch (\Throwable $th)
            {
                throw $th;
            }

    }
    
    public static function updateImageList($vid, $img)
    {
        # code...
        
        $get_project_images  =   DB::table('tblprojectimage')->where('id', $vid)->select('img_name', 'img_path')->first();

        foreach ( json_decode($get_project_images->img_name) as $key => $value) {

            $base   =   json_decode($get_project_images->img_name);

            if ( $img === $value || count($base) === 1) {
                    if ( in_array($value, ([$value]))) {
                            unset($base[$key]);
                    $img_name   =  $base;
                    $isUpdate   =  DB::table('tblprojectimage')->where('vid', $vid)->update(
                                array_merge( ['img_name' => $img_name, 'img_path' => $img_name
                                ])
                            );
                           return $isUpdate;
                    }
                    return count($base);
            }

        }



    }

    public static function deleteImageFromFolder($imageToDelete)
    {
        # code...
        if ( file_exists( public_path( static::$relativePath.$imageToDelete) )) {
            $unLinkImage = unlink( public_path( static::$relativePath.$imageToDelete));
                if ( $unLinkImage ) {
                    return true;
                }
        }
        return false;
    }

    protected function validator(array $data)
    {
        $mimeType       =   'png,jpg,jpeg,webp,gif';
        $maxSize        =   '50000';
        return Validator::make($data, [  [ "img_name" => 'required|file|'.$mimeType.'|'.'max:'.$maxSize ] ]);
    }

}