<!doctype html>
<html lang="{{ config('app.locale') }}" class="no-focus">
    <head>
        <title>Learn Laravel</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="robots" content="noindex, nofollow">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Icons -->
        <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
        <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

        <!-- Fonts and Styles -->
        @yield('css_before')
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
        <link rel="stylesheet" id="css-main" href="{{ asset('css/codebase.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

        @yield('css_after')

        <!-- Scripts -->
        <!-- <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script> -->
    </head>
    <body>
        <!-- Page Container -->
        <div id="page-container" class="sidebar-o enable-page-overlay side-scroll main-content-boxed sidebar-inverse page-header-fixed">
            <!-- Sidebar -->          
            @include('admin.include.sidebar')
            <!-- END Sidebar -->

            <!-- Header -->
            @include('admin.include.header')
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                @yield('content')
            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="opacity-0">
                <div class="content py-20 font-size-xs clearfix">
                    <div class="float-right">
                        Designed &amp; by Developed by <a class="font-w600" href="http://4eversolutions.com" target="_blank">4eversolutions.com</a>
                    </div>
                    <div class="float-left">
                        <a class="font-w600" href="javasript:void(0);" target="_blank">Learn Laravel</a> &copy; <script>document.write(new Date().getFullYear());</script>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <!-- Codebase Core JS -->
        <script src="{{ asset('js/codebase.app.js') }}"></script>

        <!-- Laravel Scaffolding JS -->
        <!-- <script src="{{ mix('js/laravel.app.js') }}"></script> -->

        @yield('js_after')
        
        <!-- Custom JS -->
        <script src="{{ asset('js/custom.js') }}"></script>
    </body>
</html>
