@php
       
$subscription_type = [
    
      'basic'        => 'basic',
      'standard'     => 'standard',   
      'professional' => 'professional',   
      
 ];  

@endphp

@extends('mefie_client_onboarding.layouts.master')

@section('page-title', config('app.name'))

@section('style-section')
    @parent
@endsection

@section('page-content-section')
<!-- Navbar STart -->
<header id="topnav" class="sticky defaultscroll">
    <div class="container">
        <!-- Logo container-->
        <div>
            <a class="logo" href="#">
                <img src="{{ asset('onboarding_assets/images/mefie_logo.png') }} " height="24" alt="">
            </a>
        </div>
        <!-- End Logo container-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
                <li id="home-feature" class="text-capitalize"><a href="{{ route("ic-form") }}">Go back</a></li>
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
</header><!--end header-->
<!-- Navbar End -->
    <!-- Price Start -->
    <section class="section" id='price'>
      <div class="container mt-5" >
          <div class="row justify-content-center">
              <div class="text-center col-12">
                  <div class="pb-2 mb-4 section-title" >
                      <h4 class="mb-4 title">Choose The Pricing Plan</h4>
                      <p class="mx-auto mb-0 text-muted para-desc">Start working with 
                          <span class="text-primary font-weight-bold">{{ config('app.name') }}</span> 
                        that can provide everything you need to generate awareness, drive traffic, connect.
                    </p>
                  </div>
              </div><!--end col-->
          </div><!--end row-->
  
          <div class="row align-items-center">
              <div class="pt-2 mt-4 col-md-2 col-12">
              </div><!--end col-->
              <div class="pt-2 mt-4 col-md-4 col-12">
                  <div id="stan-pr" class="py-5 text-center border border-0 rounded card pricing-rates starter-plan bg-light">
                      <div class="card-body">
                          <h2 class="mb-4 title text-uppercase text-primary">Standard</h2>
                          <div class="mb-4 d-flex justify-content-center">
                              <span class="mt-2 mb-0 h4">GHS</span>
                              <span class="mb-0 price h1">100</span>
                              <span class="mb-1 h4 align-self-end">/mo</span>
                          </div>
  
                          <ul class="pl-0 mb-0 list-unstyled">
                              <li class="mb-0 h6 text-muted d-flex justify-content-start">
                                  <span class="mr-2 text-primary h5">
                                  <i class="uim uim-check-circle"></i>
                                  </span>
                                      Upload up to 10 projects
                                  </li>
                              <li class="mb-0 h6 text-muted d-flex justify-content-start">
                                  <span class="mr-2 text-primary h5">
                                      <i class="uim uim-check-circle"></i>
                                  </span>
                                      Document upload
                                  </li>
                              <li class="mb-0 h6 text-muted d-flex justify-content-start">
                                  <span class="mr-2 text-primary h5">
                                      <i class="uim uim-check-circle"></i>
                                  </span>
                                      Project Photos
                              </li>
                              <li class="mb-0 h6 text-muted d-flex justify-content-start">
                                  <span class="mr-2 text-primary h5">
                                      <i class="uim uim-check-circle"></i>
                                  </span>
                                      Reports
                                  </li>
                              <li class="mb-0 h6 text-muted d-flex justify-content-start">
                                  <span class="mr-2 text-primary h5">
                                      <i class="uim uim-check-circle"></i>
                                  </span>
                                      Project Tracking
                                  </li>
                              <li class="mb-0 h6 text-muted d-flex justify-content-start">
                                  <span class="mr-2 text-primary h5">
                                      <i class="uim uim-check-circle"></i>
                                  </span>
                                      Payment processing
                                  </li>
                              <li class="mb-0 h6 text-muted d-flex justify-content-start">
                                  <span class="mr-2 text-primary h5">
                                      <i class="uim uim-check-circle"></i>
                                  </span>
                                      Email Notification
                                  </li>   
                          </ul>
                          <a href="{{ route('update_subscription-plan', Crypt::encrypt($subscription_type['standard'])) }}"   class="mt-5 mb-n4 rounded-5 btn btn-primary w-100">Choose a Plan</a>
                      </div>
                  </div>
              </div><!--end col-->
  
              <div class="pt-2 mt-4 col-md-4 col-12"  >
                  <div id="prime-pr" class="py-5 text-center border-0 rounded card pricing-rates bg-light">
                      <div class="card-body">
                          <h2 class="mb-4 title text-uppercase">professional</h2>
                          <div class="mb-4 d-flex justify-content-center">
                              <span class="mt-2 mb-0 h4">GHS</span>
                              <span class="mb-0 price h1">150</span>
                              <span class="mb-1 h4 align-self-end">/mo</span>
                          </div>
  
                          <ul class="pl-0 mb-0 list-unstyled">
                              <li class="mb-0 h6 text-muted d-flex justify-content-start">
                                  <span class="mr-2 text-primary h5">
                                  <i class="uim uim-check-circle"></i>
                                  </span>
                                      Upload unlimited number of projects
                                  </li>
                              <li class="mb-0 h6 text-muted d-flex justify-content-start">
                                  <span class="mr-2 text-primary h5">
                                      <i class="uim uim-check-circle"></i>
                                  </span>
                                      Document upload
                                  </li>
                              <li class="mb-0 h6 text-muted d-flex justify-content-start">
                                  <span class="mr-2 text-primary h5">
                                      <i class="uim uim-check-circle"></i>
                                  </span>
                                      Project Photos
                              </li>
                              <li class="mb-0 h6 text-muted d-flex justify-content-start">
                                  <span class="mr-2 text-primary h5">
                                      <i class="uim uim-check-circle"></i>
                                  </span>
                                      Reports
                                  </li>
                              <li class="mb-0 h6 text-muted d-flex justify-content-start">
                                  <span class="mr-2 text-primary h5">
                                      <i class="uim uim-check-circle"></i>
                                  </span>
                                      Project Tracking
                                  </li>
                              <li class="mb-0 h6 text-muted d-flex justify-content-start">
                                  <span class="mr-2 text-primary h5">
                                      <i class="uim uim-check-circle"></i>
                                  </span>
                                      Payment processing
                                  </li>
                              <li class="mb-0 h6 text-muted d-flex justify-content-start">
                                  <span class="mr-2 text-primary h5">
                                      <i class="uim uim-check-circle"></i>
                                  </span>
                                      Account Statements
                                  </li>    
                              <li class="mb-0 h6 text-muted d-flex justify-content-start">
                                  <span class="mr-2 text-primary h5">
                                      <i class="uim uim-check-circle"></i>
                                  </span>
                                      SMS Notification
                                  </li> 
                              <li class="mb-0 h6 text-muted d-flex justify-content-start">
                              <span class="mr-2 text-primary h5">
                                  <i class="uim uim-check-circle"></i>
                              </span>
                                  Email Notification
                              </li>
                              <li class="mb-0 h6 text-muted d-flex justify-content-start">
                                  <span class="mr-2 text-primary h5">
                                      <i class="uim uim-check-circle"></i>
                                  </span>
                                      360 virtual tour
                                  </li>   
                          </ul>
                          <a href="{{ route('update_subscription-plan', Crypt::encrypt($subscription_type['professional'])) }}"   class="mt-5 mb-n4 rounded-5 btn btn-primary w-100">Choose a Plan</a>
                      </div>
                  </div>
              </div><!--end col-->
          </div><!--end row-->
      </div><!--end container-->
  </section><!--end section-->
  <!-- Price End -->
@endsection

@section('script-section')
    @include('mefie_client_onboarding.custom-js.pricing')
@endsection