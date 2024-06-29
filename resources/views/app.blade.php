@php
    $css_version = '1.0.1';
@endphp
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'VideOlympicGames 2024') }} @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSS -->
    <link rel="stylesheet" href="/css/bootstrap.css"/>
    <link rel="stylesheet" href="/css/font-awesome.css"/>
    <link rel="stylesheet" href="/css/main.css?v={{ $css_version }}"/>
    <link rel="stylesheet" href="/css/responsive.css?v={{ $css_version }}"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Oswald:wght@200;400;700&family=Silkscreen&display=swap" rel="stylesheet">

    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#01044c">
    <meta name="msapplication-TileColor" content="#01044c">
    <meta name="theme-color" content="#01044c">

    <!-- Scripts -->
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/jquery.bxslider.min.js"></script>


    <script src="/js/main.js?v={{ $css_version }}"></script>

</head>
<body>
<header id="base-header">
    <div id="header-top">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1><img src="/images/header-logo.png" alt="Olympic Logo">VideOlympicGames 2024</h1>
                </div>
            </div>
        </div>

    </div>
    <div id="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ul>
                            <li><a href="/"><span>Home</span></a></li>
                            <li><a href="/athletes"><span>Athletes</span></a></li>
                            <li><a href="/events"><span>Events</span></a></li>
                            @auth
                            <li class="admin"><a href="/admin"><span>Admin</span></a></li>
                            @endauth
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </div>
</header>
    @yield('content')
</body>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="m-0">Developed by Zynetik Producciones - {{ date("Y") }}</p>
            </div>
        </div>
    </div>
</footer>
</html>
