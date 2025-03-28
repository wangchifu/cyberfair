<!DOCTYPE html>
<html lang="zh-TW">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta http-equiv="Content-Security-Policy" content="default-src 'none';img-src 'self' data:;style-src 'self';script-src 'self' 'unsafe-inline';font-src 'self';">
        <title>@yield('title') | {{ env('APP_NAME') }}</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <link href="{{ asset('fontawesome-free-6.7.2-web/css/all.css') }}" rel="stylesheet" type="text/css" />        
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('freelancer-gh-pages/css/styles.css') }}" rel="stylesheet" />
        @yield('before_plugin')
    </head>
    <body id="page-top">
        <!-- Navigation-->
        @include('layouts.nav')
        <!-- Masthead-->
        @yield('header')
        
        @yield('content')
        
        <!-- Footer-->
        @include('layouts.footer')
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; {{ env('APP_NAME') }} {{ date('Y') }}</small></div>
        </div>
        
        @yield('modal')
        
        <!-- Bootstrap core JS-->
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js') }}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="{{ asset('js/sb-forms-0.4.1.js') }}"></script>
    </body>
</html>
