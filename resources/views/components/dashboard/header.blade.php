<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="/dashboard" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('Assets/Dashboard/images/hdw-dash-logo-light-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('Assets/Dashboard/images/hdw-dash-logo-light.png') }}" alt="" width="130" height="70">
                    </span>
                </a>

                <a href="/dashboard" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('Assets/Dashboard/images/hdw-dash-logo-light-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('Assets/Dashboard/images/hdw-dash-logo-light.png') }}" alt="" width="130" height="70">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>

            <div class="d-none d-sm-block ms-2">
                <h4 class="page-title font-size-18">@yield('title')</h4>
            </div>
            

        </div>

        <!-- Search input -->
        <div class="search-wrap" id="search-wrap">
            <div class="search-bar">
                <input class="search-input form-control" placeholder="Search" />
                <a href="#" class="close-search toggle-search" data-bs-target="#search-wrap">
                    <i class="mdi mdi-close-circle"></i>
                </a>
            </div>
        </div>

        <div class="d-flex">

            {{-- full screen --}}
            <div class="dropdown d-none d-lg-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen"></i>
                </button>
            </div>

            {{-- Profile --}}
            <div class="dropdown d-inline-block ms-2">
                <button type="button" class="btn header-item waves-effect d-flex align-items-center" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <p class="mb-0 me-2">{{ auth()->user()->email }}</p>
                    <img class="rounded-circle header-profile-user border" src="{{ asset('Assets/Dashboard/images/users/avatar-1.jpg') }}"
                        alt="Header Avatar"> 
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{ route('change-password') }}"><i class="dripicons-user font-size-16 align-middle me-2"></i>
                        Change Password</a>
                    <a class="dropdown-item right-bar-toggle" href="#"><i class="dripicons-device-desktop font-size-16 align-middle me-2"></i>
                        Themes</a>
                    <div class="dropdown-divider"></div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="dripicons-exit font-size-16 align-middle me-2"></i>
                        Logout</a>
                </div>
            </div>

        </div>
    </div>
</header>