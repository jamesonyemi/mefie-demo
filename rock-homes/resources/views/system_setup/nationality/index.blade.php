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
                                <h4 class="mb-0 font-size-18">All Countries</h4>
                                <div class="page-title-right">
                                <a href="{{ route('nationality.create') }}" class="btn  btn-outline-primary btn-sm waves-effect waves-light" >
                                    New Country</a>
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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    <div class="card-title-desc">  </div>
                                    <table id="" class="table table-bordered dt-responsive nowrap client" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Country Code</th>
                                                <th>Country ID</th>
                                                <th>Country Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($nationality as $nation)
                                            <tr>
                                                <td id="project_id"></td>
                                                <td >
                                                    <a href=" {{ route('nationality.show', $nation->id)}}" class="nav-link mr-2" >
                                                    {{ $nation->country_code}}
                                                    </a>
                                                </td>
                                                <td >{{ $nation->id}}</td>
                                                <td>
                                                    <a href=" {{ route('nationality.show', $nation->id)}}" class="nav-link mr-2" >
                                                    {{ $nation->country_name }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href=" {{ route('nationality.show', $nation->id)}}" class="d-inline-block text-success mr-2" >
                                                        <i class="bx bxs-analyse bx-sm"></i>
                                                    </a>
                                                    <a href="{{ route('nationality.edit', $nation->id) }}" class="d-inline-block text-success mr-2" >
                                                            <i class="bx bx-edit bx-sm"></i>
                                                        </a>
                                                 <a  href="#" class="d-inline-block text-danger"
                                                        onclick="event.preventDefault();
                                                                 document.getElementById('delete'+ {{$nation->id}} ).submit();">

                                                    <form id="{{'delete' .$nation->id}}" action="{{ route('nationality.destroy', $nation->id) }}" method="post" >
                                                        {{ csrf_field() }}
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <i class="bx bx-trash bx-sm"></i>
                                                    </form>
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