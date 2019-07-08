@extends('layouts.nextpage_app')

@section('content')
<div class="container">

    <!-- profile -->
    <u class="h1"><i class="fas fa-user-astronaut"></i> -profile- </u>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            @if ($user->profile != null)
                <div class="image col-md-8 mx-auto">
                    @if ($user->profile->image_path != null)
                        <img src="{{ $user->profile->image_path }}" class="image-profile mx-auto">
                    @else
                        <img src="{{ asset('images/noprofileimage.jpg') }}" class="image-profile mx-auto">
                    @endif
                </div>
                <div class="col-md-10 mx-auto">
                    <br>
                    <p>-name-<h4>{{ $user->profile->name }}</h4></p>
                    <hr size="3" color="gray">
                    <p>-introduction-<h4>{{ $user->profile->introduction }}</h4></p>
                    <hr size="3" color="gray">
                    <p>-url-
                        <h5><a href="{{ $user->profile->url_1 }}">{{ $user->profile->url_1 }}</a><h5>
                        <h5><a href="{{ $user->profile->url_2 }}">{{ $user->profile->url_2 }}</a><h5>
                        <h5><a href="{{ $user->profile->url_3 }}">{{ $user->profile->url_3 }}</a><h5>
                    </p>
                </div>
            @else
                <div class="image col-md-8 mx-auto">
                    <img src="{{ asset('images/noprofileimage.jpg') }}" class="image-profile mx-auto">
                </div>
                <div class="col-md-10 mx-auto">
                    <br>
                    <p>-name-<h4>{{ $user->name }}</h4></p>
                    <hr size="3" color="gray">
                </div>
            @endif
        </div>
    </div>

    <!-- article -->
    <br><hr><hr><br>
    <u class="h1"><i class="fas fa-seedling"></i> -article- </u>
    <br>
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-md-3 col-sm-4 col-xs-6">
                        <div class="card m-1 card-height shadow-sm">
                            <span class="badge badge-light">
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
                            </span>
                            @if ($article->image_path != null)
                                <img class="card-img-top" src="{{ $article->image_path }}" alt="Card image cap">
                            @endif
                            @if ($article->category_id != null)
                                <a href="#"><span class="badge badge-secondary slowly p-2"><i class="fas fa-bolt"></i> {{ $article->category->name }}</span></a>
                            @endif
                            <div class="card-body">
                                <p><i class="far fa-clock"></i> {{ $article->created_at->format('Y/m/d/D') }}</p>
                                <h4 class="card-title">{{ $article->title }}</h4>
                                <hr size="3" color="gray">
                                <div class="p-4 text-right">
                                    <a href="{{ action('Admin\ArticleController@show', ['id' => $article->id]) }}" class="btn btn-primary slowly"><i class="fas fa-plane"></i> read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center"> <!-- 検索ボックス付けるなら appends(Request::all()) 必要？ -->
        {{ $articles->links() }}
    </div>
</div>
@endsection
