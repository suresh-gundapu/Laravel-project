<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel Dev') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{asset('css/style.css') }}" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss','resources/js/app.js'])
    <script>
        var siteUrl = "{{  url('') }}";
        //var config = {{ config('constants.GENERIC_GRID_RECORD_ADDED_SUCCESSFULLY') }};
    </script>
</head>

<body>
    <div class="container-fluid g-0 overflow-hidden">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                @include('layouts.menu')
                @include('layouts.flash-message')
            </div>
        </div>
        <div class="row body-content">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                @yield('content')

            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                @include('layouts.footer')
            </div>
        </div>
    </div>
    <script type="module" src="{{ asset('js/common.js') }}"></script>
    @stack('scripts')

</body>

</html>