@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-5 justify-content-center">
        <div class="col-md-8">
            <div class="card m-2 shadow-sm">
                <div class="card-header">
                    <h4><i class="fas fa-bullhorn"></i> pafevinia NEWS</h4>
                </div>
                <div class="card-body">
                    @foreach ($news as $news_part)
                        <div class="col-md-10 mx-auto">
                            <p><small><i class="fas fa-bullhorn"></i> {{ $news_part->created_at->format('Y/m/d/D') }} </small> ー <img src="{{ $news_part->user->profile->image_path }}" class="image-mini mx-auto"> {{ $news_part->content }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card m-2 shadow-sm">
                <div class="card-header">
                    <h4><i class="fas fa-certificate"></i> about "pafevinia"...</h4>
                </div>
                <div class="card-body">
                    僕達はpafeviniaです。
                    <br>
                    由来は忘れました。
                    <br>
                    (パイオニアから来ていたような)
                    <br>
                    難しいことは分かりませんが、みんながそれぞれの形で毎日ワクワク出来るような最高の人生を送る為に日々奮闘しています。
                    <br>
                    このサイトはpafeviniaの愉快な仲間たちが共同でオールジャンルのブログを運営していきます🦒
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="card m-1 card-height shadow-sm">
                            <a href="#" class="badge badge-secondary"><img src="{{ $article->user->profile->image_path }}" class="image-mini mx-auto"> {{ $article->user->profile->name }}</a>
                            @if ($article->image_path)
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
            <div class="d-flex justify-content-center"> <!-- 検索ボックス付けるなら appends(Request::all()) 必要？ -->
                {{ $articles->links() }}
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card m-1 shadow-sm">
                <div class="card-header">
                    <h4><i class="fas fa-user-astronaut"></i> user list</h4>
                </div>
                <div class="card-body">
                    <p class="card-text">user</p>
                    <p class="card-text">user</p>
                    <p class="card-text">user</p>
                    <p class="card-text">user</p>
                    <p class="card-text">user</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
