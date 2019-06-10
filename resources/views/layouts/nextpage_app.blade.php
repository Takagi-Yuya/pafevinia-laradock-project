<!DOCTYPE html>
<html lang="en" dir="ltr">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:title" content="pafevinia🦒 (共同運営ブログ)">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://pafevinia.herokuapp.com/">
    <meta property="og:image" content="https://pafevinia.herokuapp.com/">
    <!-- 画像は投稿毎に対応させたい <meta property="og:image" content="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSZpJJanfJZATM0S0_Loydo_OhMR00pvim7N79gDk-CD4CZFQL9"> -->
    <meta property="og:description" content="pafeviniaの新しい記事→『{{ $article->title }}』" />
    <meta name="twitter:card" content="summary">
    <!--　これ必須？？　<meta name="twitter:site" content="@0201yu_ya">　　-->

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
            background-image: url('../images/wakuwaku.jpg');
            position: relative;
            z-index: 0;
            margin: 15px auto;
            background-size: contain;
            background-repeat: no-repeat;
            width: 50%;
            height: 450px;
            max-width: 650px; /* 最大幅 */
            min-width: 400px; /* 最小幅 */
            filter: drop-shadow(5px 5px 5px rgba(0,0,0,0.6));
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
        .image-mini {
          width: 32px;
          height: 32px;
          -o-object-fit: cover;
             object-fit: cover;
          border-radius: 50%;
        }
        .image-profile {
          -o-object-fit: cover;
             object-fit: cover;
          border-radius: 50%;
          height: auto;
          max-width: 100%;
          display: block;
          text-align: center;
        }
        .image-article {
          object-fit: cover;
          height: auto;
          max-width: 100%;
          display: block;
          text-align:center;
        }
        .box {
            padding: 0.5em 1em;
            margin: 2em 0;
            color: #5d627b;
            background: white;
            border-top: solid 2px #1E575A;
            box-shadow: 0 3px 5px rgba(0, 0, 0, 0.22);
        }
        /*カードの右下配置*/
        .card a {
            position: absolute;
            right: 10px;
            bottom: 10px;
        }
        /*改行無し*/
        .ws-nr {
            white-space: nowrap;
        }

        /*~~~SNSボタン wide~~~*/
        /* ボタン全体 */
        .flowbtn12{
            font-family:'Verdana',sans-serif;
            border-radius: 4px;
            display:inline-block;
            width:90%;
            font-size:20px;
            transition:.4s;
            text-decoration:none;
        }
        /* ボタン内テキストマウスホバー時 */
        .flowbtn12:hover{
            color:#fff!important;
            text-decoration:none;
        }
        /* Twitter */
        .flowbtn12.fl_tw2{
            border:solid 1px #55acee;
            color:#55acee;
        }
        /* Twitterマウスホバー時 */
        .flowbtn12.fl_tw2:hover{
            border:solid 1px #55acee;
            background:#55acee;
        }
        /* Instagram */
        .flowbtn12.insta_btn2{
            border:solid 1px #c6529a;
            color:#c6529a;
        }
        /* Instagramマウスホバー時 */
        .flowbtn12.insta_btn2:hover{
            border:solid 1px #c6529a;
            background:#c6529a;
        }
        /* Facebook */
        .flowbtn12.fl_fb2{
            border:solid 1px #3b5998;
            color:#3b5998;
        }
        /* Facebookマウスホバー時 */
        .flowbtn12.fl_fb2:hover{
            border:solid 1px #3b5998;
            background:#3b5998;
        }
        /* メールアイコン */
        .flowbtn12.fl_ma2{
            border:solid 1px #f3981d;
            color:#f3981d;
        }
        /* メールアイコンマウスホバー時 */
        .flowbtn12.fl_ma2:hover{
            border:solid 1px #f3981d;
            background:#f3981d;
        }
        /* ボタン内テキスト調整 */
        .flowbtn12 span{
            font-size:14px;
            position:relative;
            left:8px;
            bottom:2px;
        }
        /* ulタグの内側余白を０にする */
        ul.snsbtniti2{
            padding:0!important;
            list-style: none;
        }
        /* ボタン全体の位置 */
        .snsbtniti2{
            display:flex;
            flex-flow:row wrap;
        }
        /* ボタン同士の余白 */
        .snsbtniti2 li{
            flex:0 0 48%;
            text-align:center !important;
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
    <hr><hr>
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
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Admin Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Admin Add') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">
                                <i class="fas fa-home"></i> GuestHome
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/admin/admin_home') }}">
                                <i class="fas fa-home"></i> AdminHome
                            </a>
                        </li>
                        <li class="nav-item dropdown dropup">
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
