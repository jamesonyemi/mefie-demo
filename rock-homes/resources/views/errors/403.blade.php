@include('partials.header')

    <div class="not-authorized-area bg-image">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="not-authorized-content">
                    <a href="#" class="logo">
                        <img src="{{ asset("assets/img/logo.png") }}" alt="image" loading="lazy" >
                    </a>

                    <h2>You are not authorized!</h2>
                    <p>You are not authorized to access this web page.</p>

                <a href="{{ route('home') }}" class="default-btn">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Not Authorized Area -->
    @include('partials.footer')
