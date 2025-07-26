<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <title>@yield('title', 'داشبورد مدیر')</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/responsive_991.css') }}" media="(max-width:991px)">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/responsive_768.css') }}" media="(max-width:768px)">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/font.css') }}">
    @stack('styles')

</head>
<body>

@include('admin.layouts.sidebar')
<div class="content">
    @include('admin.layouts.navbar')
    @yield('breadcrumb')
    @yield('content')
</div>

<script src="{{ asset('admin-assets/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/js.js') }}"></script>
@stack('scripts')

</body>
</html>
