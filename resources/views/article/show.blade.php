@extends('layouts.nextpage_app')

@section('content')
<div class="container">
    <div class="row box p-3 mb-5">
        <div class="col-md-11 mx-auto">
            <p><i class="far fa-clock"></i> {{ $article->created_at->format('Y/m/d/D') }}</p>
            <div class="image col-md-11 mx-auto">
                @if ($article->image_path != null)
                    <img src="{{ $article->image_path }}" alt="" class="image-article mx-auto">
                @endif
            </div>
            <hr size="3" color="gray">
            <h1>{{ $article->title }}</h1>
            <hr size="3" color="gray">
            <p>{!! $article->markdown_body !!}</p> <!-- HTMLをそのまま表示するため、エスケープをしないリテラルに変更 -->
            <hr size="3" color="gray">
            <br>
            <ul class="snsbtniti2">
                <li>
                    <a href="https://twitter.com/intent/tweet?url={{ request()->fullUrl() }}" class="flowbtn12 fl_tw2"><i class="fab fa-twitter"></i><span>Twitterで記事をシェア</span></a>
                </li>
                <li>
                    <a href="https://www.facebook.com/sharer.php?src=https://pafevinia.herokuapp.com/" class="flowbtn12 fl_fb2"><i class="fab fa-facebook-f"></i><span>Facebookで記事をシェア</span></a>
                </li><!--{{ request()->fullUrl() }}&t=pafeviniaの新しい記事→『{{ $article->title }}』-->
            </ul>
        </div>
    </div>
</div>
@endsection
