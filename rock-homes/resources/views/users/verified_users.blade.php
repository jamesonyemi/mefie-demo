@include('partials.master_header')
<!-- Begin page -->
<br><br><br>
<div id="layout-wrapper">
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    @include('partials.success_alert')
        <div >
            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <div class="page-title-right" style="margin-bottom:15px;">
                                    <h4 class="mt-3 font-size-18 text-capitalize"><span class="icon"><i class="bx bx-group bx-sm mx-1"></i></span>users</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- start page title -->
                    <div class="card mb-30 button-card-box ---raise-button" style="margin-bottom:20px; ">
                        <div class="card-header d-flex justify-content-between align-items-center">
    
                        </div>
                        <div class="card-body mb-2">
                            <a href="#" class="btn  btn-outline-primary btn-sm waves-effect waves-light ---raise-button"
                                data-toggle="modal" data-target=".export-modal" > Export Users</a>
                            <a href="#" class="btn btn-outline-primary btn-sm waves-effect waves-light ---raise-button"
                                data-toggle="modal" data-target=".basicModalSM" >Import Users</a>
                        </div>
                    </div>
                    <!-- end page title -->

                    <!-- FILTERING BY PROJECT STATUS  -->
                    {{-- <div><span id="filter_status"></span></div> --}}
                    <!-- END OF FILTERING BY PROJECT STATUS-->
                    
                    <nav>
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                          <li class="nav-item" role="presentation">
                            <a class="nav-link active rounded-pills" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">All</a>
                          </li>
                          <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                                unverified</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <!--show all users-->
                          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card ---raise-button">
                                        <div class="card-body">
                                            <h4 class="card-title"></h4>
                                            <div class="card-title-desc"></div>
                                            <table id="" class="table table-bordered dt-responsive w-100 client" >
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>full name</th>
                                                        <th>active</th>
                                                        <th>created</th>
                                                        <th>action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($verifiedUsers as $user)
                                                    <?php $encryptId = Crypt::encrypt($user->id) ?>
                                                    <tr>
                                                        <td id="project_id"></td>
                                                        <td >
                                                            <div class="row">
                                                                <a href=" {{ route('verified-users.show', $encryptId)}}"  class="nav-link text-capitalize"></a>
                                                                    {{ ucwords($user->full_name) }}
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td >{{ $user->active }}</td>
                                                        <td> {{ date('l, jS F, Y', strtotime($user->created_at) )}}</td>
                                                        <td>
                                                            <a href=" {{ route('verified-users.show', $encryptId)}}" class="d-inline-block text-success mr-2" >
                                                                <i class="bx bxs-analyse bx-sm"></i>
                                                            </a>
                                                            <a href="{{ route('verified-users.edit', $encryptId) }}" class="d-inline-block text-success mr-2" >
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
                          </div>
                           <!--End show all users section-->

                          <!--unverified users-->
                          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card ---raise-button">
                                        <div class="card-body">
                                            <h4 class="card-title"></h4>
                                            <div class="card-title-desc"></div>
                                            <table id="" class="table table-bordered dt-responsive w-100 client data" >
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>full name</th>
                                                        <th>active</th>
                                                        <th>created</th>
                                                        <th>action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($none_verified_users as $v_user)
                                                    <?php $encryptId = Crypt::encrypt($user->id) ?>
                                                    <tr>
                                                        <td id="project_id"></td>
                                                        <td >
                                                            <div class="row">
                                                                <a href=" {{ route('verified-users.show', $encryptId) }}"  class="nav-link text-capitalize"></a>
                                                                    {{ $v_user->full_name }}
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td >{{ $v_user->active }}</td>
                                                        <td> {{ date('l, jS F, Y', strtotime($v_user->created_at) )}}</td>
                                                        <td>
                                                            <a href=" {{ route('verified-users.show', $encryptId)}}" class="d-inline-block text-success mr-2" >
                                                                <i class="bx bxs-analyse bx-sm"></i>
                                                            </a>
                                                            <a href="{{ route('verified-users.edit', $encryptId) }}" class="d-inline-block text-success mr-2" >
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
                          </div>
                          <!--end of inactive users section-->
                        </div>
                    </nav>
                    <!-- end row -->
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->
@include('users.import_users_modal')
@include('users.export_users_modal')
@include('partials.footer')
