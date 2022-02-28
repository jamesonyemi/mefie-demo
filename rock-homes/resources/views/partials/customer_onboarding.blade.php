@include('partials.header')

@php
    // Retrieve the request's body and parse it as JSON

    $input = @file_get_contents("php://input");

    $event = json_decode($input);

    // Do something with $event

    $response_20_status    =   http_response_code(200); // PHP 5.4 or greater
    return $event;
    exit;
@endphp
        <!-- Main Content Layout -->
            <!-- Start Maintenance Area -->
    <div class="maintenance-area bg-image">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="maintenance-content">
                    <a href="/" class="logo">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="app logo">
                    </a>
                    <div class="row">
                      <h2 class="my-5 ml-5">{{ $success }}</h2>
                    </div>
                    <h4>Please we've sent you an email to activate your account on {{ config("app.name")  }}</h4>
                    <p class="badge-danger rounded rounded-pill text-white">
                        <i class='bx bxs-hand-right bx-tada mr-2 '></i>
                        The activation link will expire 
                        {{ now()->addMonths(1)->toDateString() }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Maintenance Area -->
