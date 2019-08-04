<!DOCTYPE html>
<html lang="en" dir="ltr">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-142598269-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-142598269-1');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:title" content="pafevinia🦒 (共同運営ブログ)">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.pafevinia.com/">
    <meta property="og:image" content="https://pafevinia.s3-ap-northeast-1.amazonaws.com/538vVdbSd4qjolATWp81z9lEJgRTWJrfsv0mJk9K.jpeg">
    <meta property="og:description" content="pafeviniaに関する新しい情報です！">
    <meta name="twitter:card" content="summary">

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
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sp-style.css') }}" rel="stylesheet">

    <!--favicon-->
    <link rel="shortcut icon" href="../images/pafevinia.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="../images/pafevinia_sp.png" sizes="180x180">
    <link rel="icon" type="image/png" href="../images/pafevinia_sp.png" sizes="192x192">

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
        min-width: 350px; /* 最小幅 */
        filter: drop-shadow(5px 5px 5px rgba(0,0,0,0.6));
      }
      h3 {
        font-size: 1.4rem;
      }
    </style>

</head>
<header>
    <div class="bg-white">
        <div id="toppage">
            <div class="row text-center">
                <div class="col-md-12">
                    <h1 class="title ws-nr">pafevinia🦒</h1>
                </div>
            </div>
        </div>
        @include('partials.button.form_homebutton')
        <hr>
    </div>
</header>
<body>
    <div>
        <main class="py-4">
            <!-- urlにarticle/showが含まれていれば、下記partialsは表示しない -->
            <span class="d-none">{{ $url = url()->current() }}</span>
            @if (strpos($url, '/article/show') === false)
                @include ('partials.button.form_pagetop_button')
            @endif
            @yield('content')
        </main>
    </div>
</body>
<footer>
    @include('partials.button.form_homebutton')
    <div id="foot-sub">
        <div class="container">
            @include('partials.footer.form_category')
        </div>
    </div>
    @include('partials.footer.form_navbar')
</footer>
</html>
