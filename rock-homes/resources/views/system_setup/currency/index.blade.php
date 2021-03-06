@include('partials.master_header')

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
                                <h4 class="mb-0 font-size-18">All Currrencies</h4>
                                <div class="page-title-right">
                                <a href="{{ route('currency.create') }}" class="btn  btn-outline-primary btn-sm waves-effect waves-light" >
                                   Add New Currency</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
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
                                                <th>Symbol</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($currency as $curType)
                                                @if ( $curType->isdeleted == 0 )
                                            <tr>
                                                <td id="project_id"></td>
                                                <td >{{ $curType->short_name}}</td>
                                                <td>
                                                    <a href="{{ route('currency.edit', $curType->id) }}" class="nav-link">{{ $curType->long_name }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href=" {{ route('currency.show', $curType->id)}}" class="d-inline-block text-success mr-2" >
                                                        <i class="bx bxs-analyse bx-sm"></i>
                                                    </a>
                                                    <a href="{{ route('currency.edit', $curType->id) }}" class="d-inline-block text-success mr-2" >
                                                            <i class="bx bx-edit bx-sm"></i>
                                                        </a>
                                                 <a  href="#" class="d-inline-block text-danger" 
                                                        onclick="event.preventDefault();
                                                                 document.getElementById('delete'+ {{ $curType->id }} ).submit();">

                                                    <form id="{{'delete' .$curType->id}}" action="{{ route('currency.destroy', $curType->id) }}" method="post" >
                                                        {{ csrf_field() }}
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <i class="bx bx-trash bx-sm"></i>
                                                    </form>
                                                </a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <br><br>
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