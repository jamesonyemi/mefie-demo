<div class="ecommerce-stats-area">
<div class="row">
<div class="col-lg-3 col-sm-6 col-md-6">
<div class="single-stats-card-box">
<div class="icon bg-primary">
    <i class='bx bx-calendar-check' ></i>
</div>
<span class="sub-title text-capitalize">Account Created</span>
<h3>
<span class="badge">
    {{ date('l, jS F, Y', strtotime( Auth::user()->created_at))  }}
</span>
</h3>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-md-6">
<div class="single-stats-card-box">
<div class="icon bg-secondary">
    <i class='bx bx-calendar-edit' ></i>
</div>
<span class="sub-title text-capitalize">Last Updated</span>
<h3>
    <span class="badge">
        {{ date('l, jS F, Y', strtotime( Auth::user()->updated_at))  }}
    </span>
    </h3>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-md-6">
<div class="single-stats-card-box">
<div class="icon bg-success">
    <i class='bx bx-mobile-alt' ></i>
</div>
<span class="sub-title text-capitalize">Phone number</span>
<h3>
    <span class="badge">
        {{ Auth::user()->contact_details  }}
    </span>
    </h3>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-md-6">
<div class="single-stats-card-box">
<div class="icon">
    <i class='bx bx-mail-send' ></i>
</div>
<span class="sub-title text-capitalize">Current email</span>
<h3>
    <span class="badge">
        {{ Auth::user()->email  }}
    </span>
    </h3>
</div>
</div>
</div>
</div>
@include('partials.success_alert')
<div class="tab-pane active" id="settings" role="tabpanel" aria-labelledby="settings-tab">
    <div class="card user-settings-box mb-30">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 sol-md-12 col-sm-12">
                    <div class="my-5 card-header mt-n2 d-flex justify-content-between align-items-center">
                        <div class="rounded w-100">
                            <nav class="float-right">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button class="mx-2 btn btn-outline-light" hidden id="lock">
                                        <span class="text-danger align-items-center bx-sm bx-tada" >
                                            <i class='bx bx-lock'></i>
                                        </span>
                                        <div class="st-lock">
                                            <label for="lock" class="st-text text-dark">lock</label>
                                        </div> 
                                    </button>
                                    <button class="mx-2 btn btn-outline-light" id="unlock">
                                        <span class="text-primary align-items-center bx-sm bx-tada" >
                                            <i class='bx bx-lock-open'></i>
                                        </span>
                                        <div class="st-unlock">
                                            <label for="unlock" class="st-text">unlock</label>
                                        </div> 
                                    </button>
                                  </div>
                                </div>
                              </nav>
                        </div>
                        </div>
                    
                </div>
                <hr class="">
                <div class="row">
                    <div class="col-lg-6 sol-md-12 col-sm-12">
                        <h4 class="my-5">
                            <i class='bx bx-user-circle'></i> Personal Info
                        </h4>
                    </div>
                </div>
            </div>
            <form class="" action="{{ route('fud') }}" method="POST">
                {{ csrf_field() }}
              <div class="row">
                  <div class="col-lg-4">
                      <div class="form-group">
                          <label>First Name</label>
                          <input 
                                id="fs"
                                disabled
                                type="text"
                                class="form-control text-capitalize" 
                                placeholder="Enter first name" 
                                name="first_name"
                                value="{!! Auth::user()->first_name !!}"                           
                            />
                      </div>
                  </div>
                  
                  <div class="col-lg-4">
                      <div class="form-group">
                          <label>Last Name</label>
                          <input 
                                id="fs"   
                                disabled
                                type="text"
                                class="form-control text-capitalize" 
                                name="last_name"
                                value="{!! Auth::user()->last_name !!}"
                            />
                      </div>
                  </div>

                  <div class="col-lg-4">
                      <div class="form-group">
                          <label>Middle Name</label>
                          <input
                                id="fs"
                                disabled 
                                type="text"
                                class="form-control text-capitalize" 
                                name="middle_name"
                                value="{!! Auth::user()->middle_name !!}"
                                
                            />
                      </div>
                  </div>

                  <div class="col-lg-12" hidden>
                      <div class="form-group">
                          <label>Bio</label>
                          <textarea cols="30" rows="5" placeholder="Write something..." class="form-control"></textarea>
                      </div>
                  </div>
                  <div class="col-lg-4">
                      <div class="form-group">
                          <label>Email Address</label>
                          <input
                                id="fs"
                                disabled 
                                type="text"
                                class="form-control" 
                                name="email"
                                value="{!! Auth::user()->email !!}"
                                
                            />
                          <span class="invisible form-text text-muted d-block">
                              <small>If you want to change email please <a href="#" class="d-inline-block">click</a> here.</small>
                          </span>
                      </div>
                  </div>

                  <div class="col-lg-4">
                      <div class="form-group">
                          <label>Phone Number</label>
                          <input
                                id="fs"
                                disabled 
                                type="text"
                                maxLength="15"
                                class="form-control" 
                                name="contact_details"
                                value="{!! Auth::user()->contact_details !!}"
                                
                            />
                          <span class="invisible form-text text-muted d-block">
                              <small>If you want to change phone number please <a href="#" class="d-inline-block">click</a> here.</small>
                          </span>
                      </div>
                  </div>
              </div>
              <div class="container">
                <div class="row">
                  <div class="form-group col-md-8"></div>
                    <div class="text-center col-md-4">
                        <button 
                            id="save-changes" 
                            type="submit" 
                            class="text-center ml-lg-5 btn btn-lg btn-primary btn-block" 
                            hidden  
                            >
                            <i class='text-sm text-white bx bx-server align-content-center'></i> 
                            Save Changes
                        </button>
                      </div>
              </div>
            </div>
            </form>
              <hr>
              <div class="invisible" hidden>
                  <h3><i class='bx bx-building'></i> Company Info
                    <span class="ml-2 " >
                        <i class='text-white bx bx-message-rounded-edit bx-pencil'
                        data-placement="top" data-toggle="tooltip" title="Update Company Info" type="button"
                        style="background-color: #293754;" >
                        <button class="invisible btn btn-indigo btn-icon"></button>
                    </i>
                    </span>
                </h3>
                  <div class="row">
                      <div class="col-lg-6">
                          <div class="form-group">
                              <label>Company Name</label>
                              <input type="text" class="form-control" placeholder="Enter company name">
                          </div>
                      </div>
    
                      <div class="col-lg-6">
                          <div class="form-group">
                              <label>Website</label>
                              <input type="text" class="form-control" placeholder="Enter website url">
                          </div>
                      </div>
                  </div>
              </div>
              <div class="invisible" hidden>
                  <h3><i class='bx bx-world bg-dark'></i> Social</h3>
                  <div class="row" >
                      <div class="col-lg-4">
                          <div class="form-group">
                              <label>Facebook</label>
                              <input type="text" class="form-control" placeholder="Enter facebook url">
                          </div>
                      </div>
    
                      <div class="col-lg-4">
                          <div class="form-group">
                              <label>Twitter</label>
                              <input type="text" class="form-control" placeholder="Enter twitter url">
                          </div>
                      </div>
    
                      <div class="col-lg-4">
                          <div class="form-group">
                              <label>Instagram</label>
                              <input type="text" class="form-control" placeholder="Enter instagram url">
                          </div>
                      </div>
    
                      <div class="col-lg-4">
                          <div class="form-group">
                              <label>Linkedin</label>
                              <input type="text" class="form-control" placeholder="Enter linkedin url">
                          </div>
                      </div>
    
                      <div class="col-lg-4">
                          <div class="form-group">
                              <label>Pinterest</label>
                              <input type="text" class="form-control" placeholder="Enter pinterest url">
                          </div>
                      </div>
    
                      <div class="col-lg-4">
                          <div class="form-group">
                              <label>Stack Overflow</label>
                              <input type="text" class="form-control" placeholder="Enter stack overflow url">
                          </div>
                      </div>
                  </div>
              </div>
      </div>
  </div>
</div>