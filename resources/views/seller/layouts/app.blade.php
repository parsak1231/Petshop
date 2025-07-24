<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta
        name="description"
        content="Gradient Able is trending dashboard template made using Bootstrap 5 design framework. Gradient Able is available in Bootstrap, React, CodeIgniter, Angular,  and .net Technologies."
    />
    <meta
        name="keywords"
        content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard"
    />
    <meta name="author" content="codedthemes"/>

    <title>@yield('title', 'داشبورد فروشنده')</title>

    <link rel="preload" href="{{ asset('assets/fonts/vazirmatn/Vazirmatn-Regular.woff2') }}" as="font" type="font/woff2" crossorigin="anonymous">

    <style> body {font-family: 'Vazirmatn', sans-serif !important;} </style>

    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/jsvectormap.min.css') }}"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet"/>

    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link"/>
    <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}"/>
    @stack('styles')

    <script src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/world.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/world-merc.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard-sales.js') }}"></script>

    <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/fonts/custom-font.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>

    <script>
        layout_change('light');
    </script>

    <script>
        layout_sidebar_change('light');
    </script>

    <script>
        change_box_container('false');
    </script>

    <script>
        layout_caption_change('true');
    </script>

    <script>
        layout_rtl_change('false');
    </script>

    <script>
        preset_change('preset-1');
    </script>

    <script>
        header_change('header-1');
    </script>

    @stack('scripts')
</head>

<body data-pc-header="header-1" data-pc-preset="preset-1" data-pc-sidebar-theme="light"
      data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">

<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>

@include('seller.layouts.navbar')

@include('seller.layouts.sidebar')

@yield('content')

</body>
</html>
