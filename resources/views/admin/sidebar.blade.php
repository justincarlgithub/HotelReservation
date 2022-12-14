@include('partials.header')
        <nav class="sb-topnav navbar navbar-expand " style="background: rgba(6,14,77,1); color:#ffffff;">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{url ('/') }}"> Hotel De SLSU</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Admin - {{ Auth::user()->firstname }}</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{url ('account/ac') }}">
                            <i class="mdi mdi-settings text-primary"></i>
                            My Account
                          </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                             <i class="mdi mdi-logout text-primary"></i> 
                                {{ __('Logout') }}
                            </a>
              
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav" class="shadow h-100">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{url ('admin/dashboard') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Manage</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                               Rooms
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="mdi mdi-plus-circle-outline menu-icon nav-link" href="{{url ('admin/add-room') }}">Add Rooms</a>
                                    <a class="nav-link" href="{{url ('admin/view-room') }}">View Rooms</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayout" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                              Staff
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayout" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    @if(Auth::user()->role == '2')
                                    <a class="nav-link" href="{{url ('admin/add-staff') }}">Add Staff</a>
                                    @endif
                                    <a class="nav-link" href="{{url ('admin/staff') }}">View Staff</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Reservations</div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                       Reservations
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{url ('admin/booking') }}">Soon to Check-in</a>
                                            <a class="nav-link" href="{{url ('admin/booking-checkin') }}">Currently Check-in</a>
                                            <a class="nav-link" href="{{url ('admin/booking-checkout') }}">Checkout</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link" href="{{url ('index/room') }}">
                                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                       Add Booking
                                    </a>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="  {{url ('admin/users') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                               Users
                            </a>
                            <a class="nav-link" href="  {{url ('admin/comments') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Comments
                            </a>
                          
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer shadow h-15">
                        <div class="small">Logged in as:
                        @if(Auth::user()->role == '2')
                           SuperAdmin
                       @elseif(Auth::user()->role == '1')
                           Admin
                       @endif
                    </div>
                    </div>
                </nav>
            </div>