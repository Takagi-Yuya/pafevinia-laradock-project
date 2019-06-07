@extends('layouts.admin_app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">

            <!-- profile -->
            <u class="h1"><i class="fas fa-user-astronaut"></i> -profile- </u>
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
                    </div>
                    <div class="col-md-8 mx-auto text-right">
                        <a href="{{ action('Admin\ProfileController@edit', ['user_id' => $user->id]) }}" role='button' class='btn btn-success'><i class="fas fa-wrench"></i> Edit</a>
                    </div>
                @else
                    <div class="image col-md-8 mx-auto">
                        <img src="{{ asset('images/noprofileimage.jpg') }}" class="image-profile mx-auto">
                    </div>
                    <div class="col-md-10 mx-auto">
                        <br>
                        <p>-name-<h4>{{ $user->name }}</h4></p>
                        <hr size="3" color="gray">
                        <p>※You don't have profile details yet...</p>
                        <hr size="3" color="gray">
                    </div>
                    <div class="col-md-8 mx-auto text-right">
                        <a href="{{ action('Admin\ProfileController@add') }}" role='button' class='pr-5 pl-5 mt-3 btn btn-success'><i class="fas fa-pencil-alt"></i> Create New (details)</a>
                    </div>
                @endif

            <!-- news -->
            <br><hr><hr><br>
            <u class="h1"><i class="fas fa-bullhorn"></i> -pafevinia NEWS- </u>
                @foreach ($news as $news_part)
                    <div class="col-md-10 mx-auto box">
                        <p><small><i class="far fa-clock"></i> {{ $news_part->created_at->format('Y/m/d/D') }}</small></p>
                        <p class="text-center">{{ $news_part->content }}</p>
                        <hr>
                        <div class="col-md-8 mx-auto text-right">
                            <a href="{{ action('Admin\NewsController@edit', ['id' => $news_part->id]) }}" role='button' class='btn btn-success'><i class="fas fa-wrench"></i> Edit</a>
                            <a href="{{ action('Admin\NewsController@delete', ['id' => $news_part->id]) }}" role='button' class='btn btn-danger'><i class="fas fa-ban"></i> Delete</a>
                        </div>
                    </div>
                @endforeach
            <div class="d-flex justify-content-center"> <!-- 検索ボックス付けるなら appends(Request::all()) 必要？ -->
                {{ $news->links() }}
            </div>
            <br>
            <div class="col-md-8 mx-auto text-right">
                <a href="{{ action('Admin\NewsController@add') }}" role='button' class='pr-5 pl-5 mt-3 btn btn-success'><i class="fas fa-pencil-alt"></i> Create New</a>
            </div>
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
                            <span class="badge badge-secondary">
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
                            <a href="{{ action('Admin\ArticleController@edit', ['id' => $article->id]) }}" role='button' class='m-2 btn btn-success'><i class="fas fa-wrench"></i> Edit</a>
                            <a href="{{ action('Admin\ArticleController@delete', ['id' => $article->id]) }}" role='button' class='m-2 btn btn-danger'><i class="fas fa-ban"></i> Delete</a>
                            @if ($article->image_path != null)
                                <img class="card-img-top" src="{{ $article->image_path }}" alt="Card image cap">
                            @endif
                            <div class="card-body">
                                <p><i class="far fa-clock"></i> {{ $article->created_at->format('Y/m/d/D') }}</p>
                                <h4 class="card-title">{{ $article->title }}</h4>
                                <hr size="3" color="gray">
                                <div class="p-4 text-right">
                                    <a href="{{ action('Admin\ArticleController@show', ['id' => $article->id]) }}" class="btn btn-primary"><i class="fas fa-plane"></i> read more</a>
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
    <br>
    <div class="col-md-10 mx-auto text-right">
        <a href="{{ action('Admin\ArticleController@add') }}" role='button' class='pr-5 pl-5 mt-3 btn btn-success'><i class="fas fa-pencil-alt"></i> Create New</a>
    </div>
</div>
@endsection
