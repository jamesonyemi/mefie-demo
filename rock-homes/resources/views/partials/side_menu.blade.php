<style>
    .bx-sm {
        font-size: 1.2rem!important;
    }
</style>
<?php

$admin_role_id     =   config('app.admin');
$finance_role_id   =   config('app.finance');

?>
      <!-- Side Menu -->
        <!-- Start Sidemenu Area -->
        <div class="sidemenu-area">
            <div class="sidemenu-header">
                <a href=" {{ route('home') }} " class="navbar-brand d-flex align-items-center">
                <img src="{{ asset( config('app.app_logo') ) }}" alt="company logo">
                    <span></span>
                </a>
        
                <div class="burger-menu d-none d-lg-block" >
                    <span class="top-bar"></span>
                    <span class="middle-bar"></span>
                    <span class="bottom-bar"></span>
                </div>
        
                <div class="responsive-burger-menu d-block d-lg-none">
                    <span class="top-bar"></span>
                    <span class="middle-bar"></span>
                    <span class="bottom-bar"></span>
                </div>
            </div>
        
            <div class="sidemenu-body">
                <ul class="sidemenu-nav metisMenu h-100 ---raise-button" id="sidemenu-nav" data-simplebar>
                    <li class="nav-item-title">
                        <div class="row justify-content-start">
                            <div class="d-flex mefie-bg-secondary">
                                <div class="mr-auto p-2 stat-card-box">
                                </div>
                                <div class="p-3">
                                    <span class="text-orange text-uppercase bx-sm font-weight-bold pt-2">
                                        {{ App\Traits\SubscriptionTrait::getCustomerSubscriptionPlan()->package_type }}
                                    </span>
                                    <span class="text-white text-lowercase bx-xs col-12"> 
                                         subscription
                                     </span>
                                </div>
                                <div class="p-2"></div>
                            <span class=" icon-box text-primary text-uppercase pr-3 justify-content-centre">
                                <i class='bx bxs-credit-card text-primary bx-md mt-1  ' ></i>
                                </span> 
                              </div>
                        </div>
                    </li>
                      <li class="nav-item-title">Pages</li>
                    
        @if( Auth::user()->role_id === $admin_role_id )
                   
                    <li class="{{ Request::url() == url('/admin-portal/clients') ? 'nav-item mm-active' : 'nav-item' }} ---raise-button-icons">
                        <a href=" {{ url('/admin-portal/clients') }} " class="nav-link">
                            <span class="icon"><i class='bx bx-user-circle bx-sm'></i></span>
                            <span class="menu-title bx-sm">Clients</span>
                        </a>
                    </li>
                     <li class="{{ request()->is('/admin-portal/projects*')  ? 'nav-item mm-active' : 'nav-item' }} ---raise-button-icons">
                        <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                            <span class="icon"><i class='bx bx-briefcase-alt-2 bx-sm'></i></span>
                            <span class="menu-title bx-sm">Projects</span>
                        </a>
        
                        <ul class="sidemenu-nav-second-level">
                            <li class="{{ Request::url() == url('/admin-portal/projects/create') ? 'nav-item mm-active' : 'nav-item' }}">
                                <a href="{{ route('projects.create') }}" class="nav-link">
                                    <span class="icon"><i class='bx bx-plus' ></i></span>
                                    <span class="menu-title">Add New Project</span>
                                </a>
                            </li>
        
                            <li class="{{ Request::url() == url('/admin-portal/list-all-projects') ? 'nav-item mm-active' : 'nav-item' }}">
                                <a href="{{ route('project-list') }}" class="nav-link">
                                    <span class="icon"><i class='bx bx-book-content' ></i></i></span>
                                    <span class="menu-title">All Projects</span>
                                </a>
                            </li>
                            <li class="{{ Request::url() == url('/admin-portal/corporate-client-wp') ? 'nav-item mm-active' : 'nav-item' }}">
                                <a href="{{ route('corporate-client-wp') }}" class="nav-link">
                                    <span class="icon"><i class='bx bx-user-plus' ></i></span>
                                    <span class="menu-title">Corporate Projects</span>
                                </a>
                            </li>
                            <li class="{{ Request::url() == url('/admin-portal/projects') ? 'nav-item mm-active' : 'nav-item' }}">
                                <a href="{{ route('projects.index') }}" class="nav-link">
                                    <span class="icon"><i class='bx bx-user' ></i></i></span>
                                    <span class="menu-title">Individual Projects</span>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    <li class="{{ request()->is('/admin-portal/project-docs*') ? 'nav-item mm-active' : 'nav-item' }} ---raise-button-icons" >
                        <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                            <span class="icon"><i class='bx bx-folder bx-sm'></i></span>
                            <span class="menu-title bx-sm">Documents</span>
                        </a>
        
                        <ul class="sidemenu-nav-second-level">
                            <li class="{{ Request::url() == url('/admin-portal/project-docs') ? 'nav-item mm-active' : 'nav-item' }}">
                                <a href="{{ url('/admin-portal/project-docs') }}" class="nav-link">
                                    <span class="icon"><i class='bx bxs-book-content'></i></span>
                                    <span class="menu-title">Document Info</span>
                                </a>
                            </li>
                            <li class="{{ Request::url() == url('/admin-portal/project-documents/create') ? 'nav-item mm-active' : 'nav-item' }}">
                                <a href="{{ route('project-docs.create') }}" class="nav-link">
                                    <span class="icon"><i class='bx bx-plus' ></i></span>
                                    <span class="menu-title">New Document</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ request()->is('/admin-portal/onsite-visit*') ? 'nav-item mm-active' : 'nav-item' }} ---raise-button-icons" >
                        <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                            <span class="icon"><i class='bx bx-folder bx-sm'></i></span>
                            <span class="menu-title bx-sm">On Site Visits</span>
                        </a>
        
                        <ul class="sidemenu-nav-second-level">
                            <li class="{{ Request::url() == url('/admin-portal/onsite-visit') ? 'nav-item mm-active' : 'nav-item' }}">
                                <a href="{{ url('/admin-portal/onsite-visit') }}" class="nav-link">
                                    <span class="icon"><i class='bx bxs-book-content'></i></span>
                                    <span class="menu-title">Site Info</span>
                                </a>
                            </li>
                            <li class="{{ Request::url() == url('/admin-portal/onsite-visit/create') ? 'nav-item mm-active' : 'nav-item' }}">
                                <a href="{{ route('onsite-visit.create') }}" class="nav-link">
                                    <span class="icon"><i class='bx bx-plus' ></i></span>
                                    <span class="menu-title">Add New Visit</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ Request::url() == url('/admin-portal/reports') ? 'nav-item mm-active' : 'nav-item' }} ---raise-button-icons">
                        <a href="{{ url('/admin-portal/reports') }}" class="nav-link">
                            <span class="icon"><i class=' bx bx-bar-chart bx-sm'></i></span>
                            <span class="menu-title bx-sm">Reports</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('/admin-portal/stage-of-completion*') ? 'nav-item mm-active' : 'nav-item' }} ---raise-button-icons" >
                        <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                            <span class="icon"><i class='bx bx-slider-alt bx-sm' ></i></span>
                            <span class="menu-title bx-sm">Stage</span>
                        </a>
        
                        <ul class="sidemenu-nav-second-level">
                            <li class="{{ Request::url() == url('/admin-portal/stage-of-completion') ? 'nav-item mm-active' : 'nav-item' }}">
                                <a href="{{ route('stage-of-completion.index') }}" class="nav-link">
                                    <span class="icon"><i class='bx bx-spreadsheet' ></i></span>
                                    <span class="menu-title">Stage Summary</span>
                                </a>
                            </li>
                            <li class="{{ Request::url() == url('/admin-portal/stage-of-completion/create') ? 'nav-item mm-active' : 'nav-item' }}">
                                <a href="{{ route('stage-of-completion.create') }}" class="nav-link">
                                    <span class="icon"><i class='bx bx-plus' ></i></span>
                                    <span class="menu-title">Add New Stage</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ request()->is('/admin-portal/verified-users*') ? 'nav-item mm-active' : 'nav-item' }} ---raise-button-icons" >
                        <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                            <span class="icon"><i class='bx bx-group bx-sm' ></i></span>
                            <span class="menu-title bx-sm">Users</span>
                        </a>
        
                        <ul class="sidemenu-nav-second-level">
                            <li class="{{ Request::url() == url('/admin-portal/verified-users/create') ? 'nav-item mm-active' : 'nav-item' }}">
                                <a href="{{ url('/admin-portal/verified-users/create') }}" class="nav-link">
                                    <span class="icon"><i class='bx bx-user-plus' ></i></span>
                                    <span class="menu-title">Add New User</span>
                                </a>
                            </li>
                            <li class="{{ Request::url() == url('/admin-portal/verified-users') ? 'nav-item mm-active' : 'nav-item' }}">
                                <a href="{{ url('/admin-portal/verified-users') }}" class="nav-link">
                                    <span class="icon"><i class='bx bx-group' ></i></span>
                                    <span class="menu-title">All users</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ request()->is('/admin-portal/system-setup*') ? 'nav-item mm-active' : 'nav-item' }} ---raise-button-icons">
                        <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                            <span class="icon"><i class='bx bx-lock-open'></i></span>
                            <span class="menu-title bx-sm">System Setup</span>
                        </a>
        
                        <ul class="sidemenu-nav-second-level">
                            <li class="{{ Request::url() == url('/admin-portal/system-setup/update-logo') ? 'nav-item mm-active' : 'nav-item' }}"
                                data-toggle="modal" data-target="#basicModal" >
                                <a href="#" class="nav-link" aria-expanded="true">
                                    <span class="icon"><i class='bx bx-upload'></i></span>
                                    <span class="menu-title">Upload Logo</span>
                                </a>
                            </li>
                            <li class="{{ Request::url() == url('/admin-portal/system-setup/towns') ? 'nav-item mm-active' : 'nav-item' }}">
                                <a href="{{ url('/admin-portal/system-setup/towns') }}" class="nav-link">
                                    <span class="icon"><i class='bx bxs-city'></i></span>
                                    <span class="menu-title">Towns</span>
                                </a>
                            </li>
        
                            <li class="{{ Request::url() == url('/admin-portal/system-setup/nationality') ? 'nav-item mm-active' : 'nav-item' }}">
                                <a href=" {{ url('/admin-portal/system-setup/nationality') }}" class="nav-link">
                                    <span class="icon"><i class='bx bx-flag'></i></span>
                                    <span class="menu-title">Nationality</span>
                                </a>
                            </li>
        
                            <li class="{{ Request::url() == url('/admin-portal/system-setup/title') ? 'nav-item mm-active' : 'nav-item' }}">
                                <a href="{{ url('/admin-portal/system-setup/title') }}" class="nav-link">
                                    <span class="icon"><i class='bx bxs-user-badge' ></i></span>
                                    <span class="menu-title">Title</span>
                                </a>
                            </li>
        
                            <li class="{{ Request::url() == url('/admin-portal/system-setup/currency') ? 'nav-item mm-active' : 'nav-item' }}">
                                <a href=" {{ url('/admin-portal/system-setup/currency') }}" class="nav-link">
                                    <span class="icon"><i class='bx bxs-bank' ></i></span>
                                    <span class="menu-title">Currency</span>
                                </a>
                            </li>
        
                            <li class="{{ Request::url() == url('/admin-portal/system-setup/role') ? 'nav-item mm-active' : 'nav-item' }}">
                                <a href=" {{ url('/admin-portal/system-setup/role') }}" class="nav-link">
                                    <span class="icon"><i class='bx bxs-user-pin'></i></span>
                                    <span class="menu-title">User Role</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @cannot('isBasic')
                    <li class="{{ request()->is('/admin-portal/payments*/') ? 'nav-item mm-active' : 'nav-item' }} ---raise-button-icons" >
                        <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                            <span class="icon" ><i class='ml-1 bx bx-sm'>???</i></span>
                            <span class="ml-1 menu-title bx-sm" > Payments</span>
                        </a>
        
                        <ul class="sidemenu-nav-second-level">
                            <li class="{{ Request::url() == url('/admin-portal/payments/create') ? 'nav-item mm-active' : 'nav-item' }}">
                                <a href="{{ url('/admin-portal/payments/create') }}" class="nav-link">
                                    <span class="icon"><i class='bx bx-plus' ></i></span>
                                    <span class="menu-title">Add New Payment</span>
                                </a>
                            </li>
                            <li class="{{ Request::url() == url('/admin-portal/cost-of-project') ? 'nav-item mm-active' : 'nav-item' }}">
                                <a href="{{ url('/admin-portal/cost-of-project') }}" class="nav-link">
                                    <span class="icon"><i class='bx bx-show'></i></span>
                                    <span class="menu-title">View Cost of Project</span>
                                </a>
                            </li>
                            <li class="{{ Request::url() == url('/admin-portal/print-payments-made-by-client') ? 'nav-item mm-active' : 'nav-item' }}">
                                <a href="{{ url('/admin-portal/print-payments-made-by-client') }}" class="nav-link">
                                    <span class="icon"><i class='bx bx-printer' ></i></span>
                                    <span class="menu-title">Print Payment</span>
                                </a>
                            </li>
                            <li class="{{ Request::url() == url('/admin-portal/payments') ? 'nav-item mm-active' : 'nav-item' }}">
                                <a href="{{ url('/admin-portal/payments') }}" class="nav-link">
                                    <span class="icon"><i class="bx bx-wallet" ></i></span>
                                    <span class="menu-title">All Payments</span>
                                </a>
                            </li>
                            <li class="{{ Request::url() == url('/admin-portal/additional-cost') ? 'nav-item mm-active' : 'nav-item' }}">
                                <a href="{{ url('/admin-portal/additional-cost') }}" class="nav-link">
                                    <span class="icon"><i class='bx bx-list-plus' ></i></span>
                                    <span class="menu-title">Additional Cost</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcannot
                    
                    @elseif( Auth::user()->role_id === $finance_role_id )
                        @include('partials.finance_section')
                    @endif
                     
                    <hr class="mb-4 border rounded-pill border-gray" />
                     <li class="my-5 mt-5 mb-5 mr-5 text-center col">
                 @if ( !empty(Auth::user()->created_by ) )
                        <div class="text-center menu-profile img-responsive col-12" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset(config('app.rock_rel_path').Auth::user()->photo_url) }}" alt="logo" class="text-center">
                            <div class="mt-2">
                                <div class="d-flex justify-content-center">
                                    <div>
                                     <i class='bx bx-building-house' ></i>  
                                     {{ Auth::user()->full_name }} 
                                     </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                     <div class="mt-2 ml-n3">
                                     <i class='bx bx-phone-call'></i> {{ Auth::user()->contact_details }}
                                     </div>
                                </div>
                            </div>
                        </div>
                @endif
                     </li>
                </ul>
            </div>
        </div>
        <!-- End Sidemenu Area -->
@include('partials.photo_upload')



        