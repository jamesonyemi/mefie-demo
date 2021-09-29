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

        <!-- Start -->

        <h3>View Stage of Completion  </h3>
        <div class="card mb-30">
            <div class="d-flex justify-content-around mb-4">
                <div class="" >
                    <span class="h3">
                           <i class="badge badge-secondary text-capitalize"> {{ ($stageOfCompletion->title) ? $stageOfCompletion->title : '' }} </i>
                    </span>
                    <p>
                        <i class="badge badge-default text-capitalize">Project Name</i>
                    </p>
                </div>
                <div class="" >
                        <span class="h3">
                           <i class="badge badge-secondary text-capitalize"> {{ ($stageOfCompletion->full_name) ? $stageOfCompletion->full_name : $stageOfCompletion->company_name  }} </i>
                           </span>
                           <p>
                            <i class="badge badge-default text-capitalize">Project Owner</i>
                           </p>
                </div>
                <div class="" >
                        <span class="h3">
                        @if( !empty($stageOfCompletion->project_budget))
                            <i class="badge badge-secondary">
                                <sup>GHC</sup>
                                {{ $stageOfCompletion->project_budget }}  </i>
                            @else
                                
                                <i class="badge badge-primary">
                                    Not Specified yet</i>
                            
                            @endif
                        </span>
                        <p>
                        <i class="badge badge-default">Project Budget</i>
                        </p>
                </div>
            </div>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-md-6 col-lg-12">
                    {{-- <label for="" style="float: right; clear: both;"> image preview</label> --}}
                </div>
                <div class="col-3"></div>
                <div class="col-md-6 col-lg-12">
                    
                </div>
            </div>
            <hr>
            <div class="card-body">
                <div class="form-row mt-2">
                    <div class="col-1"></div>
                    <div class="form-group col-md-4">
                        <label for="comment">Region</label>
                        <span class="list-group-item rounded" >{{ strip_tags($stageOfCompletion->region) }}</span>
                    </div>
                    <div class="form-group col-md-2"></div>
                    <div class="form-group col-md-4">
                        <label for="comment">Town</label>
                        <span class="list-group-item rounded" >{{ strip_tags($stageOfCompletion->town)}}</span>
                    </div>
                </div>
                        <div class="form-row">
                            <div class="col-1"></div>
                            <div class="form-group col-md-4">
                                <label for="phase">Project Phase</label>
                                    <span class="list-group-item rounded text-capitalize" >{{ $stageOfCompletion->phase }}</span>
                            </div>
                            <div class="form-group col-md-2">  </div>
                            <div class="form-group col-md-4">
                                <label for="amount_spent">Amt. Spent </label>
                                 <span class="list-group-item rounded" >GHC {{ $stageOfCompletion->amtspent }}</span>
                            </div>
                        </div>
                        <div class="form-row">
                        <div class="col-1"></div>
                            <div class="form-group col-md-4">
                                <label for="status">Status of Completion</label>
                                <span class="list-group-item rounded text-capitalize" >{{ ucfirst(strip_tags($stageOfCompletion->status)) }}</span>
                            </div>
                            <div class="form-group col-md-2"></div>
                            <div class="form-group col-md-4">
                                 <label for="comment">Materials Purchased</label>
                                <span class="list-group-item rounded" >{{ strip_tags($stageOfCompletion->matpurchased) }}</span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-1"></div>
                            <div class="form-group col-md-10 col-lg-10 col-sm-10 col-xl-10">
                                <div class="h-100 mt-2" >
                                    <div class="list-group">
                                      <a href="#" class="list-group-item list-group-item-action flex-column align-items-start bg-secondary">
                                        <div class="d-flex w-100 justify-content-between">
                                          <h5 class="mb-1 text-white">Details of Amount Spent</h5>
                                        </div>
                                      </a>
                                      </div>
                                    <div class="list-group mt-1">
                                        @foreach( explode("\n",  ( $stageOfCompletion->amtdetails )) as $detail_list)
                                          <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <p class="mb-1"> {{ $detail_list }}</p>
                                          </a>
                                      @endforeach
                                    </div>
                                </div>
                            </div>
                            

                            </div>
                        </div>
                 <br>
            </div>
        </div>
     <!-- End -->

<!-- End Main Content Wrapper -->

@include('partials.footer')

{{-- <script>
   let images =  document.querySelectorAll("#db-images");
   let trashIcon =  document.querySelectorAll("#removes");
   images.forEach(element => {
    // console.log(element);
       trashIcon.addEventListener("click", function(){
           let imgs = document.querySelector("#db-images").remove();
           let removeIcon = document.querySelector("#removes").remove();
           console.log(element.values = 120);
        });

   });

</script> --}}
