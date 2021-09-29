
@include('partials.header')
<!-- Side Menu -->
<!-- Start Sidemenu Area -->
@include('partials.side_menu')
<!-- End Sidemenu Area -->

<!-- Main Content Wrapper -->
<div class="main-content d-flex flex-column">
    <!-- Top Navbar -->
    <!-- Top Navbar Area -->
@include('partials.topnav')
<!-- End Top Navbar Area -->

    <!-- Main Content Layout -->
        <!-- Breadcrumb Area -->
@include('partials.breadcrumb')
<!-- End Breadcrumb Area -->

@include('partials.success_alert')

<!-- Begin page -->
<div id="layout-wrapper">


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div >
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <blockquote class="blockquote">
                          <p class="mb-0 h3"> Client Projects Info </p>
                          <small>
                              <footer class="blockquote-footer">
                                  showing total projects belonging to a client 
                              </footer>
                          </small>
                        </blockquote>
                        <div class="page-title-right">
                        
                        </div>
                    </div>
                </div>
            </div><br>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"></h4>
                            <div class="card-title-desc divider"></div>
                            <table id="" class="table table-bordered dt-responsive table-hover  stage w-100" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Owner</th>
                                        <!--<th>Action</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projectDocByClientId as $client_info)
                                    <?php $encryptId = Crypt::encrypt($client_info->clientid) ?>
                                    <?php $owner  = ($client_info->client_name) ? ucwords($client_info->client_name) : '' ?>
                                    <tr>
                                        <td id="stage" class="col-1"></td>
                                        <!--<td class="w-100">-->
                                        <!--</td>-->
                                        <td class="">
                                            <a href=" {!! route('project-owner', $encryptId )!!}" class="d-inline-block text-success mr-2" >
                                            <div class="align-item-center">
                                              <button type="button" class="btn btn-sm btn-outline-primary w-100" >
                                                  <span class="text-dark">{{ ucfirst($owner) }}</span>
                                                  <span class="badge badge-light">{{ $client_info->count_project }}</span>
                                              </button>
                                              </div>
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