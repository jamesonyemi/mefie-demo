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
                                <h4 class="mb-0 font-size-18">All Active Towns</h4>
                                <div class="page-title-right">
                                    <a href="#" class="btn btn-outline-primary btn-sm waves-effect waves-light" data-toggle="modal" data-target="#exampleModalCenter2" >Add New Town</a>
                                    <span class="pull-left"></span>
                                    <button type="button" class="btn btn-outline-primary btn-sm waves-effect waves-light" data-toggle="modal" data-target="#exampleModalCenter">Restore Town</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- end page title -->

                    <!-- FILTERING BY PROJECT STATUS  -->
                    {{-- <div><span id="filter_status"></span></div> --}}
                    <!-- END OF FILTERING BY PROJECT STATUS-->

                    <div class="row">
                        {{-- {{ ddd($regionTown) }} --}}
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    <div class="card-title-desc">  </div>
                                    <table id="" class="table table-bordered dt-responsive nowrap client" style="border-collapse: collapse; border-spacing: 0; width: 100%; min-height:0px;">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Town</th>
                                                <th>Region</th>
                                                <th style="width: 5%">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($regionTown as $town)
                                            <?php $encrypt = Crypt::encrypt($town->tid);  ?>
                                                @if ( ($town->active === "yes") || ($town->is_deleted === 0) )
                                            <tr>
                                                <td id="project_id"></td>
                                                <td >
                                                    <a href=" {{ route('towns.edit', $encrypt)}}" class="nav-link" >
                                                    {{ $town->town}}
                                                    </a>
                                                </td>
                                                <td>{{ $town->region }}</td>
                                                <td class="pt-3 text-center col-1">
                                                    <a href=" {{ route('towns.show', $encrypt)}}" class="mr-2 d-inline-block text-info" >
                                                        <i class="bx bxs-analyse bx-sm"></i>
                                                    </a>
                                                    <a href="{{ route('towns.edit', $encrypt) }}" class="mr-2 d-inline-block text-success">
                                                            <i class="bx bx-edit bx-sm"></i>
                                                    </a>
                                                </td>
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
    <br><br><br>
    <!-- END layout-wrapper -->
    @include('system_setup.towns.restore')
    @include('system_setup.towns.create')

@include('partials.footer')
