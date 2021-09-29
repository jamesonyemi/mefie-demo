@include('partials.client-portal.master_header')
<!-- Main Content Wrapper -->
    <!-- Begin page -->
    <div id="layout-wrapper mt-5">
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div>
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18"> Project Tracking</h4>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    <div class="card-title-desc">  </div>   
                                    <table id="" class="table table-bordered dt-responsive table-responsive w-100 my-projects" >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>project</th>
                                                <th>location</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tracking as $project)
                                            <?php $encryptId = Crypt::encrypt($project->pid) ?>
                                            @if ( $project->project_status === "ongoing" )
                                            <tr>
                                                <td id="client_ids"></td>
                                                <td >
                                                    <a href=" {{ route('my-project-tracking.show',  $encryptId)}}" class="d-inline-block nav-link mr-2" 
                                                        data-toggle="tooltip" data-placement="top" title="" data-original-title="view">
                                                    {{ $project->project_name }}
                                                     </a>
                                                </td>
                                                <td>{{ $project->project_location }}</td>    
                                            </tr>
                                             @endif
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->
@include('partials.client-portal.footer')
