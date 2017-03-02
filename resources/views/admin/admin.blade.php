<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/tinymce/tinymce.min.js" ></script>


</head>
<body>
<div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a target="_blank" class="navbar-brand" href="{{ url('/') }}">Перейти на сайт  </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav text-center">
                        &nbsp;<li><a href="{{route('admin')}}">Админ панель</a></li>
                        &nbsp;<li><a href="{{route('add_items')}}">Добавить товар</a></li>
                        &nbsp;<li><a href="{{route('settings')}}">настройки сайта</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Выход</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>

    <!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="/vendor/jasekz/laradrop/js/enyo.dropzone.js"></script>
<script src="/vendor/jasekz/laradrop/js/laradrop.js"></script>
<script src="/js/jquery.validate.min.js" ></script>
<script>
    $(function () {
        tinymce.init({
            selector: '#textarea',
            language: 'ru',
            plugins: "emoticons colorpicker textcolor",

            toolbar: "emoticons" | " backcolor" |"textcolor",

        });

        var url = location.href;
        var a = $('.navbar-nav li a').each(function () {
            if(this.href == url){
                $(this).css('background','rgba(119, 119, 119,0.5)')
            }
        });
    })
</script>
@yield('script')
</body>
</html>
