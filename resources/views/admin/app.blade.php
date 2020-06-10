<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.5, shrink-to-fit=no" />
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin</title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="/img/favicon.ico">

    <link href="/lib/normalize-8.0.1.css" rel="stylesheet">
    <link href="/lib/bootstrap-4.3.1.min.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <header>
        <nav class="navbar navbar-expand-sm navbar-light border-bottom">
            <div class="container">
                <a class="navbar-brand" href="{{ route('admin.index') }}">Admin Panel</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">

                        @guest

                        <li><a class="nav-link" href="{{ route('login') }}">Войти</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">Регистрация</a></li>

                        @else

                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::user()->email }}
                            </a>

                            <ul class="dropdown-menu">
                                <a class="dropdown-item" href={{ route('admin.products.index') }}>Продукты</a>
                                <hr class="m-2">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выйти</a>
                                <form class="d-none" id="logout-form" action="{{ route('logout') }}" method="POST">
                                    {{ csrf_field() }}
                                </form>
                            </ul>
                        </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('content')

    <!-- Scripts -->
    <script src="/lib/jquery-3.4.1.min.js"></script>
    <script src="/lib/popper-1.14.6.min.js"></script>
    <script src="/lib/bootstrap-4.3.1.min.js"></script>
    <script src="/js/app.js"></script>
</body>
</html>
