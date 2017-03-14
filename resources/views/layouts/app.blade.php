<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1000", initial-scale="1">

<meta property="og:image" content="http://maks.fermaeko.com/img/header_for_share.jpg" />
<meta property="og:image:width" content="604" />
<meta property="og:image:height" content="604" />

<meta name="description" content="Пакеты со склада оптом Киев"/>
<meta name="robots" content="noodp"/>
<link rel="canonical" href="http://maks.fermaeko.com" />
<meta property="og:locale" content="ru_RU" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Пакеты со склада оптом Киев" />
<meta property="og:description" content="Пакеты со склада оптом  по низкой цене !" />
<meta property="og:url" content="http://maks.fermaeko.com" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:description" content="Пакеты со склада оптом  Киев по низкой цене !" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/lightbox.js" ></script>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    @yield('script')
</head>
<body>
<div id="app">
    @include('.layouts.header')
        @yield('content')
    @include('layouts.footer')
</div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
<script src="/js/jquery.magnific-popup.min.js"></script>

</body>
</html>
