<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="dripicons-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                {{-- <li class="mm-active">
                    <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="true">
                        <i class="mdi mdi-alert-circle"></i>
                        <span>Report</span>
                    </a>
                    <ul class="sub-menu mm-collapse mm-show" aria-expanded="true" style="">
                        <li><a href="#">Inbox</a></li>
                    </ul>
                </li> --}}

                {{-- <li class="menu-title">Home Page</li> --}}
                <li class="mm-active">
                    <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="true">
                        <i class="mdi mdi-spin mdi-cog"></i>
                        <span>Content Management</span>
                    </a>
                    <ul class="sub-menu mm-collapse mm-show" aria-expanded="true" style="">
                        <li><a href="{{ route('home-slider-content') }}">Home Slider</a></li>
                        <li><a href="{{ route('about-content') }}">About </a></li>
                        <li><a href="{{ route('services-content') }}">Services</a></li>
                        <li><a href="{{ route('news-content') }}">News</a></li>
                        <li><a href="{{ route('projects-content') }}">Projects</a></li>
                        <li><a href="{{ route('video-content') }}">Video</a></li>
                        <li><a href="{{ route('contact-content') }}">Contact </a></li>
                        <li><a href="{{ route('activities-content') }}">Activities</a></li>
                        <li><a href="{{ route('education-content') }}">Education</a></li>
                        <li><a href="{{ route('faq-content') }}">Faq</a></li>
                        <li><a href="{{ route('profile-team') }}">Profile Team</a></li>
                        <li><a href="{{ route('inbox-contact') }}">Inbox Contact</a></li>
                    </ul>
                </li>

                <li class="mm-active">
                    <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="true">
                        <i class="mdi mdi-spin mdi-cog"></i>
                        <span>Master Data</span>
                    </a>
                    <ul class="sub-menu mm-collapse mm-show" aria-expanded="true" style="">
                        <li><a href="{{ route('services-category') }}">Service Category</a></li>
                    </ul>
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->