    <nav class="navbar top-navbar navbar-expand">
           <div class="collapse navbar-collapse" id="navbarSupportContent">
                <ul class="navbar-nav right-nav align-items-center">
                <li class="nav-item ml-5 notification-box dropdown">
                <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="notification-btn">
                    <span class="card-title text-capitalize">{{ $field ?? $field }} </span>     
                <i class="bx bx-bell"></i>
                <span class="badge badge-secondary">{{ $counter ?? $counter }}</span>
                </div>
                </a>
                <div class="dropdown-menu">
                <div class="dropdown-header justify-content-between align-items-center">
                <span class="title d-inline-block">6 New Notifications</span>
                </div>
                <div class="dropdown-body">
                <a href="#" class="dropdown-item d-flex align-items-center">
                    @php
                    
                        $collection->map(function ($item, $key) {
                            return $item * 2;
                            <div class="content">
                            <span class="d-block">return $item</span>
                            <p class="sub-text mb-0">2 sec ago</p>
                            </div>
                        });
                    
                    @endphp
                <!--<div class="icon">-->
                <!--<i class="bx bx-message-rounded-dots"></i>-->
                <!--</div>-->
                </a>
                <div class="dropdown-footer">
                <a href="#" class="dropdown-item">View All</a>
                </div>
                </div>
                </li>
                </ul>
                </div>
                </div>
    </nav>