@include('partials.master_header')

<div class="mt-3 mb-20 card">
    <div class="card-body">
            <section class="profile-area">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">
                                            <div class="row">
                                                <h4 class="mt-2 mb-0 text-capitalize col-sm-12">upgrade subscription package</h4>
                                            </div>
                                <div class="row">
                                    <div class="col-lg-12" id="corporate">
                                        <div class="timeline-story-content">
                                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                                <div class="col-6"></div>
                                                <div class="row">
                                                    <div class="page-title-right">
                                                    <a href="{!! url()->previous()!!}" class="btn btn-outline-primary btn-sm waves-effect waves-light" >Back</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="my-5 card" role="alert">
                                              <p class="text-center card-text h5">You have reached the maximum limit on your current subscription is kindly upgrade.</p>
                                                <a href="{{ route("pricing-page") }}" 
                                                    class="text-white btn btn-info btn-lg active w-100 text-capitalize" 
                                                    role="button" aria-pressed="true">   
                                                    Upgrade Now
                                                </a>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
<div class="flex-grow-1"></div>
<br>
@include('partials.footer')
@include('clients.check_email.email_exist')
