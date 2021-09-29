@include('partials.master_header')
@include('partials.breadcrumb')
<!-- Begin page -->
<br><br>
<div id="layout-wrapper">
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    @include('partials.success_alert')
        <div >
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    @include("partials.previous_page_optional_title", ["page_title" => "Visited Projects"]) 
                    <br>
                    <!-- end page title -->

                    <!-- FILTERING BY PROJECT STATUS  -->
                    <!-- END OF FILTERING BY PROJECT STATUS-->
            
                    <p class="text-capitalize btn btn-outline-primary">{{ $get_client_name->client_name }}</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    <div class="card-title-desc">  </div>
                                    <table id="" class="table table-bordered dt-responsive nowrap client" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Project</th>
                                                <th>no. of visits</th>
                                                <th>Site location</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                     @foreach ($filter_count_on_project_visited as $visit)
                                     <?php 
                                     
                                         $encryptClientd = Crypt::encrypt($visit->clientid); 
                                         $encryptPid = Crypt::encrypt($visit->pid); 
                                         
                                     ?>
                                      <?php $owner = ($visit->full_name) ?? $visit->full_name  ?>
                                            <tr>
                                                <td id="project_id"></td>
                                              <td>
                                                 <a href=" {{ route('project-visited', [ $encryptPid, $encryptClientd ] ) }}" 
                                                    class="nav-link mr-2" >
                                                     {{ ucwords($visit->project_name) }} 
                                                </a>
                                                </td>
                                                <td class="">
                                            <a href="#" class="d-inline-block text-success mr-2" >
                                            <div class="align-item-center">
                                              <button type="button" class="btn btn-sm btn-outline-primary w-100" >
                                                  <span class="badge badge-light">{{ $visit->visited }}</span>
                                              </button>
                                              </div>
                                            </a>
                                        </td>
                                                <td> 
                                                    {{ ucwords($visit->project_location) }}
                                                </td>
                                                <td>
                                                    <a href=" {{ route('project-visited', [ $encryptPid, $encryptClientd ] ) }}" class="d-inline-block text-success mr-2  bx-sm" >
                                                        <i class="bx bxs-analyse bx-sm"></i>
                                                    </a>
                                                    <a href="{{ route('onsite-visit.edit', [$encryptPid, Crypt::encrypt($visit->vid) ]  ) }}" class="d-inline-block text-success mr-2 bx-sm" >
                                                            <i class="bx bx-edit bx-sm"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                    @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <br><br>
                    <!-- end row -->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->
@include('partials.footer')