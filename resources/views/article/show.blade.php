@extends('layouts.nextpage_app')

@section('content')
@include ('partials.button.form_share_button')
<div class="container">
    <div class="row box p-3 mb-5">
        <div class="col-md-11 mx-auto">
            <p>
                <a href="{{ action('Admin\ProfileController@show', ['id' => $article->user->id]) }}" class="badge badge-light slowly p-2">
                    @if ($article->user->profile != null && $article->user->profile->image_path != null)
                        <img src="{{ $article->user->profile->image_path }}" class="image-mini mx-auto">
                        {{ $article->user->profile->name }}
                    @elseif ($article->user->profile != null && $article->user->profile->image_path == null)
                        <img src="{{ asset('images/noprofileimage.jpg') }}" class="image-mini mx-auto">
                        {{ $article->user->profile->name }}
                    @elseif ($article->user->profile == null)
                        <img src="{{ asset('images/noprofileimage.jpg') }}" class="image-mini mx-auto">
                        {{ $article->user->name }}
                    @endif
                </a>
                @if ($article->category_id != null)
                    <a href="{{ action('Admin\CategoryController@index', ['id' => $article->category_id]) }}" class="badge badge-secondary slowly p-3"><i class="fas fa-bolt"></i> {{ $article->category->name }}</a>
                @endif
            </p>
            <p><i class="far fa-clock"></i> {{ $article->created_at->format('Y/m/d/D') }}</p>
            <div class="image col-md-11 mx-auto">
                @if ($article->image_path != null)
                    <img src="{{ $article->image_path }}" alt="" class="image-article mx-auto">
                @endif
            </div>
            <hr>
            <h1>{{ $article->title }}</h1>
            <hr>
            <p>{!! $article->markdown_body !!}</p> <!-- HTMLをそのまま表示するため、エスケープをしないリテラルに変更 -->
            <hr size="5" color="gray">
            <br>
            <ul class="snsbtniti2 mt-5 mb-5 pc">
                <li>
                    <a href="https://twitter.com/intent/tweet?url={{ request()->fullUrl() }}" class="flowbtn12 fl_tw2"><i class="fab fa-twitter"></i><span>Twitterでシェア</span></a>
                </li>
                <li>
                    <a href="https://www.facebook.com/sharer.php?src=https://www.pafevinia.com/" class="flowbtn12 fl_fb2"><i class="fab fa-facebook-f"></i><span>Facebookでシェア</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
