<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ url('/images/ayaicon.png') }}" sizes="192x192" />
    <link rel="apple-touch-icon" href="{{ url('/images/ayaicon.png') }}" sizes="180x180" />
    <meta name="msapplication-TileImage" content="{{ url('/images/ayaicon.png') }}" sizes="270x270" />

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ url('/fonts/boxicons.css') }}" />

    <link rel="stylesheet" href="{{ url('/css/core.css') }}" />
    <link rel="stylesheet" href="{{ url('/css/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ url('/css/design.css') }}" />
    <link rel="stylesheet" href="{{ url('/css/perfect-scrollbar.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <style type="text/css">
        html, body{
            background-color: #ffffff;
            font-family: 'Roboto', sans-serif;
        }
        .navbar-nav > .nav-item {
            font-size: 16px !important;
        }
        .form-control, .form-select, input::file-selector-button {
            color: #566a7f !important;
        }
        .js-cookie-consent {
            display: none;
        }
        .menu-vertical .menu-item.active:not(.open) > .menu-link {
            font-weight: normal !important;
        }
        .menu-vertical .menu-inner > .menu-item .menu-link, .menu-vertical .menu-icon {
            color: #fff !important;
        }

        .menu-item.active{
            background-color: #CB9D4C;
            border-top-right-radius: 50px;
            border-bottom-right-radius: 50px;
        }
        .layout-wrapper:not(.layout-horizontal) .bg-menu-theme .menu-inner > .menu-item.active:before {
            background: transparent !important;
        }
        .bg-menu-theme .menu-inner > .menu-item.active > .menu-link {
            background-color: transparent !important;
        }
        .form-label {
            text-transform: capitalize !important;
        }
        .space-10 {
            height: 10px;
        }
        .space-20 {
            height: 20px;
        }
    </style>

    <script src="{{ url('/js/helpers.js') }}"></script>
    <script src="{{ url('/js/config.js') }}"></script>
</head>
<body>
    @yield('content')

    <script src="{{ url('/js/jquery.js') }}"></script>
    <script src="{{ url('/js/popper.js') }}"></script>
    <script src="{{ url('/js/bootstrap.js') }}"></script>
    <script src="{{ url('/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ url('/js/menu.js') }}"></script>
    <script src="{{ url('/js/main.js') }}"></script>
    <script src="{{ url('/js/function.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>
</html>