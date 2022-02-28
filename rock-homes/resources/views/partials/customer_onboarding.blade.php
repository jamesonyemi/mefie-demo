@include('partials.header')
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
                    {{ ddd($event) }}
                </div>
            </div>
        </div>
    </div>
    <!-- End Maintenance Area -->
