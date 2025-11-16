<!-- Preloader Start -->
<div class="preloader">
    <div class="loading-container">
        <div class="loading"></div>
        <div id="loading-icon"><img class="loader-img" src="{{ asset('Assets/Landing/images/hdw-loader.png') }}"
                alt=""></div>
    </div>
</div>
<!-- Preloader End -->


<!-- Topbar Section Start -->
<div class="topbar">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-5">
                <!-- Topbar Contact Information Start -->
                <div class="topbar-contact-info">
                    <ul>
                        <li><a href="#"><i class="fa-solid fa-phone"></i> {{ $contact->contact_number }}</a></li>
                        <li><a href="#"><i class="fa-regular fa-envelope"></i> {{ $contact->email }}</a></li>
                    </ul>
                </div>
                <!-- Topbar Contact Information End -->
            </div>


            <div class="col-lg-5 col-md-5">
                <!-- Topbar Social Links Start -->
                <div class="topbar-social-links">
                    <ul>
                        <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
                <!-- Topbar Social Links End -->
            </div>
            <div class="flex col-lg-2 col-md-2">
                {{-- Languages --}}
                <div class="dropdown d-inline d-md-block ms-2 text-end">
                    <button type="button" class="btn header-item waves-effect" id="dropdownButtonLang"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="me-2"
                            src="{{ asset('Assets/Landing/images/flags/' . (app()->getLocale() == 'en' ? 'uk-flag.png' : 'id-flag.png')) }}"
                            alt="Header Language" height="16">
                        <span class="text-white">{{ config('app.available_locales')[app()->getLocale()] }}</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" id="dropdownMenuLang"
                        aria-labelledby="dropdownButtonLang">
                        @foreach (config('app.available_locales') as $locale => $language)
                            <a href="{{ url('language/' . $locale) }}" class="dropdown-item notify-item">
                                <img src="{{ asset('Assets/Landing/images/flags/' . ($locale == 'en' ? 'uk-flag.png' : 'id-flag.png')) }}"
                                    alt="user-image" class="me-1" height="12">
                                <span class="align-middle">{{ $language }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>


                {{-- <div class="dropdown d-inline d-md-block ms-2 text-end">
                        <button type="button" class="btn header-item waves-effect" id="dropdownButtonLang" aria-haspopup="true" aria-expanded="false">
                            <img class="me-2" src="{{ asset('Assets/Landing/images/flags/uk-flag.png') }}" alt="Header Language" height="16">
                            <span class="text-white">English</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" id="dropdownMenuLang" aria-labelledby="dropdownButtonLang">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{ asset('Assets/Landing/images/flags/uk-flag.png') }}" alt="user-image" class="me-1" height="12">
                                <span class="align-middle"> English </span>
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{ asset('Assets/Landing/images/flags/id-flag.png') }}" alt="user-image" class="me-1" height="12">
                                <span class="align-middle"> Indonesia </span>
                            </a>
                        </div>
                    </div> --}}


            </div>
        </div>
    </div>
</div>
<!-- Topbar Section End -->


<!-- Header Start -->
<header class="main-header" id="#top">
    <div class="header-sticky ">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- Logo Start -->
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('Assets/Landing/images/hdw-icon2.png') }}" width="149" alt="Logo">
                </a>
                <!-- Logo End -->

                <!-- Main Menu Start -->
                <div class="collapse navbar-collapse main-menu">
                    <div class="nav-menu-wrapper">
                        <ul class="navbar-nav mr-auto" id="menu">
                            <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active-menu' : '' }}"
                                    href="{{ route('home') }}">{{ __('header.home') }}</a></li>
                            <li class="nav-item"><a class="nav-link {{ request()->is('about') ? 'active-menu' : '' }}"
                                    href="{{ route('about') }}">{{ __('header.about') }}</a></li>
                            {{-- <li class="nav-item"><a class="nav-link {{ request()->is('services') ? 'active-menu' : '' }}" href="{{ route('services') }}">{{ __('header.services') }}</a></li> --}}
                            {{-- <li class="nav-item"><a class="nav-link {{ request()->is('news') ? 'active-menu' : '' }}"
                                    href="{{ route('news') }}">{{ __('header.news') }}</a></li> --}}
                            <li class="nav-item submenu"><a
                                    class="nav-link {{ request()->is('projects') || request()->is('video') ? 'active-menu' : '' }}"
                                    href="#">media</a>
                                <ul>
                                    <li class="nav-item"><a class="nav-link"
                                            href="{{ route('activities') }}">{{ __('header.activities') }}</a></li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="{{ route('education') }}">{{ __('header.education') }}</a></li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="{{ route('projects') }}">{{ __('header.projects') }}</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('video') }}">Video</a></li>
                                </ul>
                            </li>
                            <li class="nav-item highlighted-menu"><a
                                    class="nav-link {{ request()->is('contact-us') ? 'active-menu' : '' }}"
                                    href="{{ route('contact') }}">{{ __('header.contact_us') }}</a></li>
                        </ul>
                    </div>
                    <!-- Let’s Start Button Start -->
                    <div class="header-btn d-inline-flex">
                        <a href="{{ route('contact') }}" class="btn-default">{{ __('header.contact_us') }}</a>
                    </div>
                    <!-- Let’s Start Button End -->
                </div>
                <!-- Main Menu End -->
                <div class="navbar-toggle"></div>
            </div>
        </nav>
        <div class="responsive-menu"></div>
    </div>
</header>
<!-- Header End -->
