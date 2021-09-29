@include('partials.client-portal.master_header')
<!-- Main Content Wrapper -->
    <!-- Begin page -->
    <div id="layout-wrapper" style="margin-top:100px;">
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
                                <h4 class="mb-0 font-size-18">My Current Projects</h4>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <h4 class="card-title"></h4>
                                    <div class="card-title-desc">  </div>   
                                    <table id="" class="table table-bordered dt-responsive w-100 my-projects" >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>project</th>
                                                <th>status</th>
                                                <th>location</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($retriveProjects as $project)
                                            <?php $encryptId = Crypt::encrypt($project->pid) ?>
                                            <tr>
                                                <td id="client_ids"></td>
                                                <td >
                                                    <a href="{!! url('client-portal/pv/') . '/'. $encryptId  !!}" class="d-inline-block nav-link mr-2">
                                                    {{ $project->title }}
                                                     </a>
                                                </td>
                                                <td >
                                                    {{ $project->status }}
                                                </td>
                                                <td>{{ $project->location }}</td>    
                                            </tr>
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
