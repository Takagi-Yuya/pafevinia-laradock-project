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
    <meta property="og:description" content="pafeviniaの新しい記事が作成されました。">
    <meta name="twitter:card" content="summary">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>pafevinia🦒(admin)</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
    //delete check
    function delete_alert(e){
       if(!window.confirm('本当に削除しますか？')){
          window.alert('キャンセルされました');
          return false;
       }
       document.deleteform.submit();
    };
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!--favicon-->
    <link rel="shortcut icon" href="../images/pafevinia.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="../images/pafevinia_sp.png" sizes="180x180">
    <link rel="icon" type="image/png" href="../images/pafevinia_sp.png" sizes="192x192">

    <style>
        .title {
            font-size: 50px;
            color: #1E575A;
            text-shadow: 5px 5px 5px #808080;
            margin: 20px;
        }
    </style>

</head>
<body>
    <div class="bg-white shadow-sm">
        <div id="toppage">
            <div class="row text-center">
                <div class="col-md-12">
                    <h1 class="title">pafevinia🦒(admin)</h1>
                </div>
            </div>
        </div>
        <div align="center">
            <a href="{{ url('/') }}" class="user-link"><i class="fas fa-home"></i> GuestHome</a>
            <br>
            <a href="{{ url('/admin/admin_home') }}" class="user-link"><i class="fas fa-home"></i> AdminHome</a>
        </div>
    </div>
    <div>
        <main class="py-4 mt-3">
            @yield('content')
        </main>
    </div>
</body>
<footer>
    @include('partials.footer.form_navbar')
</footer>
</html>
