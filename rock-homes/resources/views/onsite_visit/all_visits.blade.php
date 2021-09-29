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
                    <div class="mt-5 ">
                        @include("partials.previous_page_optional_title", 
                            ["page_title" => "All Onsite Visits -- ". ucwords($project_belongs_to->full_name) ])         
                    </div>

                    <!-- FILTERING BY PROJECT STATUS  -->
                    <!-- END OF FILTERING BY PROJECT STATUS-->

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
                                                <th>Date of Visit</th>
                                                <th>Site Visited</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                     @foreach ($getClientVisits as $visit)
                                     <?php $encrypt_visit_id = Crypt::encrypt($visit->vid); $encrypt_client_id = Crypt::encrypt($visit->clientid);  ?>
                                      <?php $owner = ($visit->full_name) ? $visit->full_name : $visit->company_name ?>
                                            <tr>
                                                <td id="project_id"></td>
                                                <td>
                                                    <a href=" {{ route('onsite-visit.show', $encrypt_visit_id)}}" class="nav-link mr-2" >
                                            {{ ucwords(date("l, jS F, Y", strtotime($visit->date_of_visit) )) }}
                                                    </a>
                                                </td>
                                              
                                                <td > {{ ucwords($visit->project_location ) }} </span></td>
                                                <td>
                                                    <a href=" {{ route('onsite-visit.show', $encrypt_visit_id)}}" class="d-inline-block text-success mr-2  bx-sm" >
                                                        <i class="bx bxs-analyse bx-sm"></i>
                                                    </a>
                                                    <a href="{{ route('onsite-visit.edit', [ Crypt::encrypt($visit->pid) , $encrypt_visit_id ] ) }}" 
                                                        class="d-inline-block text-success mr-2 bx-sm" >
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