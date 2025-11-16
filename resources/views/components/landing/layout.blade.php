<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Karuna ID | @yield('title')</title>
    @include('components.landing.styles')
</head>

<body>

    @include('components.landing.header')

    {{ $slot }}

    @include('components.landing.footer')

    @include('components.landing.scripts')
    @stack('scripts')


</body>

</html>
