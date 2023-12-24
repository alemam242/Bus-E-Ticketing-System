<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/images') }}/logo-sm.png" alt="" height="22" />
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images') }}/logo-dark.png" alt="" height="17" />
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/images') }}/logo-sm.png" alt="" height="22" />
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images') }}/logo-light.png" alt="" height="17" />
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.dashboard') }}" data-bs-toggle="" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i data-feather="home" class="icon-dual"></i>
                        <span data-key="t-dashboards">Home</span>
                    </a>
                </li>
                <!-- end Dashboard Menu -->

                <li class="nav-item">
                    <a class="nav-link menu-link collapsed"
                        href="{{ route('admin.ticket', Session::get('admin')['id']) }}" data-bs-toggle="" role="button"
                        aria-expanded="false" aria-controls="sidebarTables">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-database icon-dual">
                            <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                            <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                            <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                        </svg> <span data-key="t-tables">Tickets</span>
                    </a>

                </li>


                {{-- End of Task List --}}

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
