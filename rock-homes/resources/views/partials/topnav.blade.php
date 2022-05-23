<nav class="navbar top-navbar navbar-expand">
    <div class="collapse navbar-collapse" id="navbarSupportContent">
        <div class="responsive-burger-menu d-block d-lg-none">
            <span class="top-bar"></span>
            <span class="middle-bar"></span>
            <span class="bottom-bar"></span>
        </div>
        <ul class="navbar-nav left-nav align-items-center">
            
        </ul>

        <form class="ml-auto nav-search-form d-none d-md-block">
            {{-- <label><i class="bx bx-search"></i></label>
            <input type="text" class="form-control" placeholder="Search here..."> --}}
        </form>

        <ul class="navbar-nav right-nav align-items-center">

             <li class="nav-item notification-box dropdown">
                <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                    <div class="mr-4">
                        <span class="content d-flex justify-content-between align-items-center" style="margin-right:145px";>
                            <a href="#" class="navbar-brand d-flex align-items-center">
                               <img src="{{ asset( config('app.app_logo') ) }}" alt="company logo" class="hide-app-logo" style="display:none">
                        <span>
                    </span>
                </a>
                </span>
                </div>
                </a>
            </li> 

            <li class="nav-item dropdown profile-nav-item">
                <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="menu-profile">
                        <span class="name">Hi {{ Auth::user()->first_name . ' '. Auth::user()->last_name }}</span>
                        <img 
                            class="rounded-circle"
                            src="{{ empty(Auth::user()->photo_url) 
                                ? asset('assets/img/user1.jpg') :
                                asset(config('app.rock_rel_path').Auth::user()->photo_url) }}" 
                           alt="user image"
                             >
                    </div>
                </a>

                <div class="dropdown-menu">
                    @if( Auth::user()->role_id === config('app.admin') )
                    <div class="dropdown-body">
                        <ul class="p-0 pt-1 profile-nav">
                            <li class="nav-item">
                                <a href="{{ route('user-profile') }}" class="nav-link">
                                    <div>
                                    <span class="icon"><i class='bx bx-user bx-sm'></i></span>
                                    <span class="menu-title bx-sm">Profile</span>
                                    
                                </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    @endif
                    <div class="dropdown-footer">
                        <ul class="profile-nav">
                            <li class="nav-item">
                                  <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class='bx bx-log-out'></i> <span>Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>



