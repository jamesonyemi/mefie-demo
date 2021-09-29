@include('partials.master_header')
        <!-- Start -->
         <div class="mt-5 ">
            @include("partials.previous_page_optional_title", ["page_title" => "Edit Onsite Info"])         
         </div>
         
        @php 
            $image_collection = count(json_decode($project_owner->img_name));
      @endphp
      
    @if ( $image_collection > 0 )
        <div class="card mb-30 mt-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <?php $ownedBy  = ($project_owner->full_name) ?? $project_owner->full_name ?>
                <div class="container">
                    <div class="row">
                        <div class="row">
                            <div class="row">
                            </div>
                            <div class="row mx-1"> 
                                <div class="col-0"></div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <i class="text-center badge badge-primary">Project Owner: </i>
                                        <i class="badge badge-secondary text-capitalize">{{ $ownedBy}}</i>
                                    </div>
                                    <div class="col-md-1" style="margin-top: 10px !important;"></div>
                                <div class="col-lg-6 col-md-6 col-sm-6 mt-lg-2 mt-md-2 mt-sm-5">
                                    <i class="text-center badge badge-primary">Project Name: </i>
                                        <i class="badge badge-secondary text-capitalize ">{{ $project_owner->project_name}}</i>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-2"></div>
                                </div>

                            </div>
                        </div>
                    </div>
            </div>
            @else
            <div class="alert alert-info rounded-pill" role="alert">No Image Available! </div>
       @endif
            <hr />
               
            
             <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    <div class="card-title-desc">  </div>
                                    <table id="" class="table table-bordered dt-responsive table-hover w-100 client">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Remarks</th>
                                                <th>Last Visited</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                
                                     @foreach ($getAllVisit as $visit)
                                     <?php $encryptId = Crypt::encrypt($visit->vid) ?>
                                      <?php $owner = ($visit->full_name) ? $visit->full_name : $visit->company_name ?>
                                            <tr id="horizontalNav">
                                                <td id="project_id"></td>
                                                <td class="col-sm-6 text-capitalize"> 
                                                    {{ substr($visit->comments, 0, 40). "..." }} 
                                                    </td>   
                                                <td > 
                                                 @if( empty(json_decode($visit->img_name)) )
                                                    <button class="btn btn-white" 
                                                        pr_id="{{ $encryptId }}"
                                                        value="{{ $visit->comments }}"
                                                        id="pr_btn"
                                                        data-toggle="modal" 
                                                        data-target="#myModal"
                                                        onclick="getData(this.value); generateURLs();"
                                                        >
                                                        <a role="button" id="remove-image" href="#" class="badge badge-primary bx-sm rounded-left rounded-right"  >
                                                            <i class='bx bx-pencil text-white' ></i>           
                                                        </a>
                                        			</button>
                                    				@else
                                                        {{ ucwords(date("l, jS F, Y", strtotime($visit->date_of_visit) )) }}
                                                    @endif
                                                </td>
                                                @foreach ( json_decode($visit->img_name) as $sec_key => $img_name)
                                                <td >
                                                    <button class="btn btn-white" 
                                                    record_id="{{ $encryptId }}"
                                                    img_url="{{ $img_name }}"
                                                    value="{{ $visit->comments }}"
                                                    id="action_btn"
                                                    data-toggle="modal" 
                                                    data-target="#myModal"
                                                    onclick="getData(this.value); generateURL();"
                                                    >
                                                    <a role="button" id="remove-image" href="#" class="badge badge-primary bx-sm rounded-left rounded-right"  >
                                                        <i class='bx bx-pencil text-white' ></i>           
                                                    </a>
                                    				</button>
                                                </td>
                                    		@endforeach	
                                            </tr>
                                    @endforeach
                                    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    
                    <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content w-100">
              <div class="modal-header">
                <h4 class="modal-title text-capitalize" id="myModalLabel">update details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                  <div class="gallery-area mt-4">

                      @if ( ($image_collection) )
                      <div class="col-lg-4 col-sm-6 col-md-6">
                      </div>
                    <div class="row">
                            <div class="col-lg-4 col-sm-6 col-md-6">
                            <div class="single-gallery-image mb-30">
                                <div class="row">
                                         <div class="col-10">
                                            <img id="image" class="" src="" alt="on site visit image" 
                                                  data-original="" width="250px" height="100px">
                                         </div>
                                        <div class="col-2 mx-n3">
                                            <a  id="remove-image" href="#" class="badge badge-danger bx-sm rounded-left rounded-right bg-transparent shadow-sm" 
                                                    role="button" data-toggle="modal" data-target=".remove-image-modal-sm" >
                                                <i class='bx bx-trash text-danger' ></i>
                                            </a>
                                        </div>
                                        
                               </div>
                            </div>
                        </div>
                    </div>
                        @else
                          <div class="single-gallery-image mb-30">
                              <p>No Image Available</p>
                          </div>
                      @endif
                </div>
                <form id="profileForm" action="" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                    @include("onsite_visit.edit_modal")
               </form>
              </div>
            </div>
          </div>
        </div>

    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="mySmallModalLabel">Modify Date of Visit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <input type="date" id="mdate" name="mdate" class="form-control mb-3"
                            max="<?= gmdate("Y-m-d") ?>" >
                  </div>
                </div>
              </div>
        </div>
        
         <div class="modal fade remove-image-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary tex-white">
                            <h6 class="modal-title" id="mySmallModalLabel">
                                <p class="text-white"> Are you sure you wish to remove this image?</p>
                            </h6>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true" class="text-white">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <img id="preview-image" class="" src="" alt="on site visit image" 
                                              data-original="" width="100px" height="100px">

                            <form id="delete-image" action="" 
                                    method="POST" enctype="multipart/form-data" class="">
                                {{ csrf_field() }}
                                @method('PUT')
                            <input type="hidden" id="RowId" value="">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
                            <button class="btn btn-danger" id="remove-button" type="submit">Remove Image</button>
                        </div>
                     </form>
                    </div><!-- end modal-content -->
                </div><!-- end modal-dialog -->
            </div><!-- end modal -->
        

@include("partials.footer")


 <script>
     (
         () => {
             let date_of_visit = document.getElementById("vdate");
             let modify_visit  = document.getElementById("mdate");

                if ( modify_visit ) {
                        modify_visit.addEventListener('change', () => {
                            date_of_visit.setAttribute("value", modify_visit.value)
                        });
                    }

         }
     )();
     
 </script>
 
 
 <script type="text/javascript">
   document.addEventListener("DOMContentLoaded", function(event) {

      var elems = document.querySelectorAll('#horizontalNav td button');

      for (var i = elems.length; i--;)
           elems[i].addEventListener("click", handler, false);
            
   }, false);

   function handler(event) {
        const el            =       event.currentTarget;
        let img_url         =       `{{ asset(config('app.project_image')).'/' }}${el.getAttribute("img_url")}`;
        const image_name    =       el.getAttribute("img_url");
        const vid           =       {{ "$project_owner->vid" }};
        console.log(image_name)
        
       document.querySelector("#image").setAttribute('src', img_url);
       document.querySelector("#image").setAttribute('data-original', img_url);
       
       document.querySelector("#preview-image").setAttribute('src', img_url);
       document.querySelector("#preview-image").setAttribute('data-orginal', img_url)
       let url  =   '{{ route('remove-unlink-project_image' , [$project_owner->vid, "image_name" ]) }}';
       document.querySelector("#delete-image").setAttribute('action', url.replace("image_name", image_name) );
       
   }
   
   
   
</script>
                    

<script type="text/javascript">
      
    const FormControl   =   document.querySelector("#profileForm");
   
  function getData(value) { 
     
      $("#profileForm").find("[name='comments']").val(value);
  
  }
  
  
  function generateURL() { 
      
    const url           =   '{{ route('onsite-visit.update', ":query" ) }}';
    let s               =   $("#action_btn").attr('record_id');
    FormControl.setAttribute('action', url.replace(":query", 1) );
      
  }
  
  function generateURLs() { 
      
    const url           =   '{{ route('onsite-visit.update', ":query" ) }}';
    let pr               =   $("#pr_btn").attr('pr_id');
    FormControl.setAttribute('action', url.replace(":query", pr) );
      
  }
  
  
  
  
 </script>
 

    
