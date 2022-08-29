<!--
=========================================================
* Argon Dashboard PRO - v1.2.1
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro


* Copyright 2021 Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Kopegtel Risti</title>
        <link rel="icon" type="image/png" href="/img/logo/logo_white.png"/>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

        <!-- Icons -->
        <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

        <!-- Argon CSS -->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/argon.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/sweetalert2.min.css') }}">
    </head>

    <body>
        <!-- Core -->
        <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/bootstrap.bundle.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/js.cookie.js') }}"></script>

        <!-- Argon JS -->
        <script type="text/javascript" src="{{ URL::asset('js/argon.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/argon.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/sweetalert2.min.js') }}"></script>
        
        <script 
            src="https://code.jquery.com/jquery-3.6.0.slim.js" 
            integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" 
            crossorigin="anonymous">
        </script>

        {{-- Header --}}
        @include('layouts.header')    

        {{-- Sidebar --}}
        @include('layouts.sidebar')

        {{-- Content --}}
        @yield('content')

    </body>
</html>