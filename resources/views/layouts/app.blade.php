<!DOCTYPE html>
<html dir="rtl" lang="fa-IR">

<head>
    <title>@yield('title', 'پت شاپ')</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 , maximum-scale=1">

    <link href="{{ asset('Css/Main.css') }}" rel="stylesheet">
    <link href="{{ asset('Css/Menu.css') }}" rel="stylesheet"/>
    <link href="{{ asset('Css/Style.css') }}" rel="stylesheet"/>
    <link href="{{ asset('Css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('Css/owl.theme.min.css') }}" rel="stylesheet" />
    @stack('styles')
</head>

<body>

<div class="main_wrap">
    <div class="of-site-mask"></div>

    @include('layouts.header')

    <div class="clearfix"></div>

    @yield('breadcrumb')
    @yield('content')
</div>

@if(!in_array(Route::currentRouteName(), ['login.form', 'register.form']))
    @include('layouts.footer')
@endif

<script src="{{ asset('Js/jquery.min.js') }}"></script>
<script src="{{ asset('Js/bootstrap.min.js') }}"></script>
<script src="{{ asset('Js/my-script.js') }}"></script>
<script src="{{ asset('Js/custom.js') }}"></script>
@stack('scripts')

</body>
</html>
