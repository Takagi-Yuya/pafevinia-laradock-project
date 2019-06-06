@extends('layouts.nextpage_app')

@section('content')
<div class="container">
    <div class="row box p-3 mb-5">
        <div class="col-md-11 mx-auto">
            <p><i class="far fa-clock"></i> {{ $article->created_at->format('Y/m/d/D') }}</p>
            <div class="image col-md-11 mx-auto">
                @if ($article->image_path)
                    <img src="{{ $article->image_path }}" alt="" class="image-article mx-auto">
                @endif
            </div>
            <hr size="3" color="gray">
            <h1>{{ $article->title }}</h1>
            <hr size="3" color="gray">
            <p>{!! $article->markdown_body !!}</p> <!-- HTMLをそのまま表示するため、エスケープをしないリテラルに変更 -->
            <hr size="3" color="gray">
            <a href="http://twitter.com/share?url={{ request()->fullUrl() }}&text=pafeviniaの新しい記事→『{{ $article->title }}』"><i class="fab fa-twitter"></i>Twitterでシェア</a>
        </div>
    </div>
</div>
@endsection
