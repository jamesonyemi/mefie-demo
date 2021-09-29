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
{{-- @include('partials.breadcrumb') --}}
<!-- End Breadcrumb Area -->

@include('partials.success_alert')
<!-- Main Content Wrapper -->
    <!-- Begin page -->
    <div id="layout-wrapper" style="margin-top:100px;">
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div>
            <div class="page-content">
                @if (session('status'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                      <strong>{{ session('status') }}</strong> 
                      <span>
                            ( {{ ucwords($project_stageName->project_name) }} )
                        </span>
                        <span>Project</span>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                @endif
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">
                                    <div class="mb-2">
                                        <i class="badge badge-secondary rounded-pill" style="font-size: 1rem">Project Owner</i> 
                                    </div>
                                    <span>{{ ucwords($client_info->client_name) }}</span>  
                                </h4>
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
                                    <table id="" class="table table-bordered dt-responsive nowrap stage" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <td id="stage">#</td>
                                                <th>Project Phase</th>
                                                <th>Total amt spent</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($get_stage_info as $project_stage)
                                            <?php $encryptId = Crypt::encrypt($project_stage->clientid) ?>
                                            <tr>
                                                <td class="mb-5"></td>
                                                <td  class="mb-5">
                                                    <a href=" {{ route('stage-of-completion.show',  Crypt::encrypt($project_stage->stage_id) ) }}" 
                                                    data-toggle="tooltip" data-placement="top" title="{{ $project_stage->project_name}}"
                                                    class="d-inline-block nav-link text-capitalize">
                                                    {{ $project_stage->phase}}
                                                     </a>
                                                </td>
                                                <td>
                                                    <i class=""> GH₵</i>
                                                    {{ ($project_stage->amtspent) }}</td>    
                                                <td>
                                                    {{ ucfirst($project_stage->amtdetails) }}
                                                </td>
                                                <td>
                                                    <a href=" {!! route('stage-of-completion.show', Crypt::encrypt($project_stage->stage_id) )!!}" class="mr-2 d-inline-block text-success" >
                                                        <i class="bx bxs-analyse bx-sm"></i>
                                                    </a>
                                                    <a href="{!! route('stage-of-completion.edit', Crypt::encrypt($project_stage->stage_id) ) !!}" class="mr-2 d-inline-block text-success" >
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
