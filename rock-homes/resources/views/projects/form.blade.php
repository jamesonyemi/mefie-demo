@can('project-per-client')
 {{  view('clients.upgrade_subscription') }}
@else
@include('partials.header')
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
    <!--@include('partials.breadcrumb')-->
    <!-- End Breadcrumb Area -->


        <!-- Start -->
        <div class="mt-5 mb-5 card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Project Details</h3>
            </div>
            <hr>
            <div class="card-body">
                <form class="mt-5" action="{{route('projects.store') }}"  method="POST">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-4">
                            <label for="client">Client</label>
                            @canany(['isProfessional'])
                                @include('partials.client_to_auth_user.dropdown')       
                            @elsecanany(['isBasic', 'isStandard'])
                                @include('partials.client_to_auth_user.line_through_dropdown')       
                            @endcanany
                        </div>
                        <div class="form-group col-md-2"> </div>
                        <div class="form-group col-md-4">
                            <label for="project-title">Project Title</label>
                            <input type="text" class="form-control" id="title"
                            name="title" required>

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-4">
                            <label for="region">Region</label>
                            <select id="rid" name="rid" class="form-control custom-select" required>
                                <option value="">-- select --</option>
                            @foreach ($regions as $id => $region)
                                    <option value="{{ $id }}" class="text-capitalize">{{ ucwords($region)  }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2"></div>

                        <div class="form-group col-md-4">
                            <label for="town">Towns:</label>
                            <select id="tid" name="tid" class="form-control" required>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-4">
                            <label for="other_landmark">Other Land Marks Close to Project</label>
                            <input type="text" class="form-control" id="landmark"
                                name="landmark" required>
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="project_state">Project Status </label>
                            <select id="statusid" name="statusid" class="form-control custom-select" required>
                                <option value="">-- select --</option>
                                @foreach ($project_status as $key => $status)
                                <option value="{{ $status }}" class="text-capitalize">{{ ucwords($key)  }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-4">
                            <label for="cost-title">Estimated cost of project</label>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-sm-2 col-md-2 col-lg-2" style="margin-right:-1.5rem;">
                                                <img  id="country_flag" class="border-0 form-control form-control-sm ">
                                        </div>
                                        <div class="col-sm-3 col-md-3 col-lg-3" style="margin-right:-1.5rem;">
                                            <label for="currency-code" class="mr-5 form-control form-control-sm">
                                                </label>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 justify-content-start" style="min-width: 220px;" >
                                            <input type="number" step="0.1" class="form-control form-control-sm" id="totalcost"
                                                name="totalcost" required aria-describedby="helpId" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="project-description">Project Description</label>
                            <textarea class="form-control" name="description" id="description"  required > </textarea>
                            <div class="row">
                                <div class="mt-2 col-10">
                                    <span id="signal-message"></span>
                                </div>
                                <div class="col-2">
                                    <div class="mt-2 ml-2 col-sm-1">
                                        <span id="signal-icon"></span>
                                    </div>
                                </div>
                            </div>
                            @error('description') <span class="ml-2 row text-danger" id="error-notify" >{{$message}}</span>  @enderror
                        </div>
                    </div>
                     <hr style="background-color:fuchsia; opacity:0.1">
                      <div class="container">
                          <div class="row">
                              <div class="col-1"></div>
                        <div class="form-group col-md-1"></div>
                              <div class="text-center col">
                                  <button type="submit" class="btn btn-lg btn-primary" id="save-project" disabled ><i data-feather="database"></i>
                                    Save Project</button>
                                </div>
                                <div class="form-group col-md-2"></div>
                        </div>
                      </div>
                </form>
            </div>
        </div>
@endcan
        <!-- End -->
 @include('partials.footer')
 @include('projects.region_town_dropdown')
 @include('projects.project_js_script.description_enforcement')
 
 
 <script>
    const url_endpoint =   'https://ipapi.co/' + "/{{ Request()->ip }}/" + 'json';
       fetch(`${url_endpoint}`)
          .then( function(response) {
              if (response.status !== 200) {
                  console.log('Looks like there was a problem. Status Code: ' +
                      response.status);
                  return;
              }
              // Examine the text in the response
              response.json().then(function(data) {
                  if (document.getElementById("country_flag")) {
                      document.querySelector("label[for='currency-code']").textContent = data.currency;
                      document.getElementById("country_flag").src = `https://ipapi.co/static/images/flags/` + (data.country_code).toLowerCase() + ".png";
                  }
                  return;
              })
          });  
</script>

