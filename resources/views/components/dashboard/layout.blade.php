<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') | Admin Hadiwana</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('components.dashboard.styles')
    {{-- @vite('resources/js/app.js') --}}

</head>

<body data-sidebar="dark">

<!-- Loader -->
<div id="preloader">
    <div id="status">
        <div class="spinner"></div>
    </div>
</div>

<!-- Begin page -->
<div id="layout-wrapper">

    @include('components.dashboard.header')
    
    @include('components.dashboard.sidemenu')

    <!-- start main content here -->
    <div class="main-content">
        <!-- Page-content -->
        <div class="page-content">
            <div class="container-fluid">
                {{ $slot }}
            </div>
        </div>
        <!-- End Page-content -->
        @include('components.dashboard.footer')
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

@include('components.dashboard.scripts')
@stack('scripts')
@include('components.dashboard.theme-settings')
</body>

</html>