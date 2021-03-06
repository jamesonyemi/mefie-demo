@include('partials.master_header')
<div class="card mb-20 mt-3">
    <div class="card-body">
    <section class="profile-area">
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">
                        <div class="row">
                            <div class="col-lg-12" id="corporate">
                                <div class="timeline-story-content">
                                    <div class="card mb-30">
                                        <div class="row">
                                            <h5 class="mb-0 text-capitalize col-sm-12">New Corporate Client</h5>
                                        </div>
                                        <div class="card-body" >
                                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                                <div class="col-6"></div>
                                                <div class="row">
                                                    <div class="page-title-right">
                                                    <a href="{!! url()->previous()!!}" class="btn btn-outline-primary btn-sm waves-effect waves-light" >Back</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @include('clients.cc_form')
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

@include('partials.footer')
@include('clients.check_email.cc_email_exist')
