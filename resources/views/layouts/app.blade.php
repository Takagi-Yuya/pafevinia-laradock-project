<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>pafevinia🦒</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        #toppage {
            background-image: url('images/wakuwaku.jpg');
            position: relative;
            z-index: 0;
            margin: 15px auto;
            background-size: contain;
            background-repeat: no-repeat;
            width: 50%;
            height: 450px;
            max-width: 650px; /* 最大幅 */
            min-width: 400px; /* 最小幅 */
        }
        .title {
            font-size: 70px;
            color: #e9ecef;
            text-shadow: 5px 5px 5px #808080;
            margin-bottom: 20px;
        }
        .card-height {
            height: 95%;
        }
    </style>

</head>
<body>
    <div id="toppage">
        <div class="row text-center">
            <div class="col-md-12">
                <h1 class="title">pafevinia🦒</h1>
            </div>
        </div>
    </div>
    <div align="center" >
        <a href="{{ url('/') }}">
        <i class="fas fa-home"></i> HOME
        </a>
    </div>
    <hr>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<footer>
    <div align="center" >
        <a href="{{ url('/') }}">
        <i class="fas fa-home"></i> HOME
        </a>
    </div>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <div class="pt-3 pl-5">
            <p>(C) 2019 pafevinia / created by T.Y.</p>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('管理者Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('管理者Add') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</footer>
</html>
