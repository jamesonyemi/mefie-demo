  
    {{ Breadcrumbs::render('action board') }}
    
   <div class="mt-5 row">
            <div class="col-lg-4 col-md-6">
                <div class="stats-card-box bg-orange">
                    <a href="{{ url('/admin-portal/clients/create/ic-form') }}" class="justify-content-center nav-link ">
                        <div class="bg-transparent icon-box bg-success">
                            <i class="bx bxs-user-plus text-orange"></i>
                        </div>
                        <span class="sub-title text-dark text-capitalize font-weight-bold">Add individual client</span>
                        <div class="progress-list">
                        <p>Section to create individual client</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="stats-card-box bg-orange">
                    <a href="{{ url('/admin-portal/clients/create/cc-form') }}" class="justify-content-center nav-link">
                        <div class="bg-transparent icon-box bg-success">
                            <i class='bx bx-user-plus text-orange' ></i>
                        </div>
                        <span class="sub-title text-dark text-capitalize font-weight-bold">Add corporate client</span>
                        <div class="progress-list">
                            <p>Section to create corporate client</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="stats-card-box bg-orange">
                    <a href="{{ url('/admin-portal/client-wnp') }}" class="justify-content-center nav-link ">
                        <div class="bg-transparent icon-box bg-success">
                        <i class='bx bxs-user-detail text-orange' ></i>
                        </div>
                        <span class="sub-title text-dark text-capitalize font-weight-bold">individual clients</span>
                        <div class="progress-list">
                        <p>A comprehensive list of individual clients</p>
                        </div>
                    </a>
                </div>
             </div>
             <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="stats-card-box bg-orange">
                    <a href="{{ url('/admin-portal/corporate-client-wnp') }}" class="justify-content-center nav-link ">
                        <div class="bg-transparent icon-box bg-success">
                            <i class='bx bxs-bank text-orange'></i>
                        </div>
                        <span class="sub-title text-dark text-capitalize font-weight-bold">corporate clients</span>
                        <div class="progress-list">
                            <p>A comprehensive list of corporate clients</p>
                        </div>
                    </a>
                </div>
            </div>
     </div>