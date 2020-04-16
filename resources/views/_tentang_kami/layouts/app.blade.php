<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Ternaknesia</title>

        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/_tentang_kami/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{ asset('css/_tentang_kami/main.css') }}" rel="stylesheet">
        @yield('script_header')
    </head>
    <!-- Body -->
    <body class="bg-white">
        @include('_tentang_kami.layouts.navbar')
        
        <!-- Content -->
        @yield('content')

        @include('_tentang_kami.layouts.footer')
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="{{ asset('js/_tentang_kami/app.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/_tentang_kami/main.js') }}"></script>
        @yield('script_footer')
    </body>
</html>
