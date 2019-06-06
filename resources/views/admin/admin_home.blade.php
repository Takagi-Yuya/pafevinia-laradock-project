@extends('layouts.admin_app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">

            <!-- profile -->
            <u class="h1"> -profile- </u>
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
                        <hr size="3" color="gray">
                        <p>name：{{ $user->profile->name }}</p>
                        <hr size="3" color="gray">
                        <p>introduction：{{ $user->profile->introduction }}</p>
                        <hr size="3" color="gray">
                    </div>
                    <div class="col-md-8 mx-auto text-right">
                        <a href="{{ action('Admin\ProfileController@edit', ['user_id' => $user->id]) }}" role='button' class='btn btn-success'>Edit</a>
                    </div>
                @else
                    <div class="image col-md-8 mx-auto">
                        <img src="{{ asset('images/noprofileimage.jpg') }}" class="image-profile mx-auto">
                    </div>
                    <div class="col-md-10 mx-auto">
                        <br>
                        <hr size="3" color="gray">
                        <p>name：{{ $user->name }}</p>
                        <hr size="3" color="gray">
                        <p>※You don't have profile details yet...</p>
                        <hr size="3" color="gray">
                    </div>
                    <div class="col-md-8 mx-auto text-right">
                        <a href="{{ action('Admin\ProfileController@add') }}" role='button' class='btn btn-success'>Create New</a>
                    </div>
                @endif

            <!-- news -->
            <hr>
            <u class="h1"> -pafevinia NEWS- </u>
                @foreach ($news as $news_part)
                    <div class="col-md-10 mx-auto box">
                        <p><small>{{ $news_part->created_at->format('Y/m/d/D') }}</small></p>
                        <p class="text-center">{{ $news_part->content }}</p>
                        <hr>
                        <div class="col-md-8 mx-auto text-right">
                            <a href="{{ action('Admin\NewsController@edit', ['id' => $news_part->id]) }}" role='button' class='btn btn-success'>Edit</a>
                            <a href="{{ action('Admin\NewsController@delete', ['id' => $news_part->id]) }}" role='button' class='btn btn-danger'>Delete</a>
                        </div>
                    </div>
                @endforeach
            <div class="d-flex justify-content-center"> <!-- 検索ボックス付けるなら appends(Request::all()) 必要？ -->
                {{ $news->links() }}
            </div>
            <br>
            <div class="col-md-8 mx-auto text-right">
                <a href="{{ action('Admin\NewsController@add') }}" role='button' class='btn btn-success'>Create New</a>
            </div>

            <!-- article -->
            <hr>
            <u class="h1"> -article- </u>
                @foreach ($articles as $article)
                    <div class="row box p-3 mb-5">
                        <div class="col-md-11 mx-auto">
                            <p>{{ $article->created_at->format('Y/m/d/D') }}</p>
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
                            <div class="col-md-11 mx-auto text-right">
                                <a href="{{ action('Admin\ArticleController@edit', ['id' => $article->id]) }}" role='button' class='btn btn-success'>Edit</a>
                                <a href="{{ action('Admin\ArticleController@delete', ['id' => $article->id]) }}" role='button' class='btn btn-danger'>Delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            <div class="d-flex justify-content-center"> <!-- 検索ボックス付けるなら appends(Request::all()) 必要？ -->
                {{ $articles->links() }}
            </div>
            <br>
            <div class="col-md-11 mx-auto text-right">
                <a href="{{ action('Admin\ArticleController@add') }}" role='button' class='btn btn-success'>Create New</a>
            </div>
        </div>
    </div>
</div>
@endsection
