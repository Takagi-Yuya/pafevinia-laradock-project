@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-5 justify-content-center">
        <div class="col-md-7">
            <div id="news_img" class="card m-2 shadow-sm font-about">
                <div class="card-header">
                    <h3><i class="fas fa-bullhorn"></i> pafevinia NEWS</h3>
                </div>
                <div class="card-body">
                    @foreach ($news as $news_part)
                        <div class="col-md-12 mx-auto">
                            <p>
                                @include('partials.tag.form_newtag', ['part' => $news_part])
                                <small><i class="fas fa-bullhorn"></i> {{ $news_part->created_at->format('Y/m/d') }} ー </small>
                                @if ($news_part->user->profile != null && $news_part->user->profile->image_path != null)
                                    <img src="{{ $news_part->user->profile->image_path }}" class="image-mini mx-auto">
                                @elseif ($news_part->user->profile != null && $news_part->user->profile->image_path == null)
                                    <img src="{{ asset('images/noprofileimage.jpg') }}" class="image-mini mx-auto">
                                @elseif ($news_part->user->profile == null)
                                    <img src="{{ asset('images/noprofileimage.jpg') }}" class="image-mini mx-auto">
                                @endif
                                {{ $news_part->content }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div id="about_img" class="card m-2 shadow-sm font-about">
                <div class="card-header">
                    <h3><i class="fas fa-certificate"></i> What's about "pafevinia"</h3>
                </div>
                <div class="card-body">
                    僕達はpafeviniaです。
                    <br>
                    由来は忘れました。
                    <br>
                    (パイオニアから来ていたような)
                    <br><br>
                    難しいことは分かりませんが、みんながそれぞれの形で毎日ワクワク出来るような最高の人生を送る為に日々奮闘しています。
                    <br><br>
                    このサイトはpafeviniaの愉快な仲間たちが共同でオールジャンルのブログを運営していきます。
                    <br><br>
                    <h4> We are all set to get crazy 🦒</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-lg-8">
            @include ('partials.search.form_search')
            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="card m-1 card-height shadow-sm">
                            <a href="{{ action('Admin\ProfileController@show', ['id' => $article->user->id]) }}" class="badge badge-light slowly">
                              @include('partials.tag.form_newtag', ['part' => $article])
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
                            @if ($article->image_path != null)
                                <img class="card-img-top" src="{{ $article->image_path }}" alt="Card image cap">
                            @endif
                            @if ($article->category_id != null)
                                <a href="{{ action('Admin\CategoryController@index', ['id' => $article->category_id]) }}"><span class="badge badge-secondary slowly p-2"><i class="fas fa-bolt"></i> {{ $article->category->name }}</span></a>
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
            <div class="d-flex justify-content-center"> <!-- 検索ボックス付けるなら appends(Request::all()) 必要？ -->
                {{ $articles->links() }}
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3><i class="fas fa-user-astronaut"></i> user list</h3>
                </div>
                @foreach ($users as $user)
                    <a href="{{ action('Admin\ProfileController@show', ['id' => $user->id]) }}" class="card-body text-center user-link slowly">
                        <div class="card-text col-md-12 text-center">
                            @if ($user->profile != null && $user->profile->image_path != null)
                                <img src="{{ $user->profile->image_path }}" class="image-middle mx-auto">
                                @include('partials.user.form_user_info')
                            @elseif ($user->profile != null && $user->profile->image_path == null)
                                <img src="{{ asset('images/noprofileimage.jpg') }}" class="image-middle mx-auto">
                                @include('partials.user.form_user_info')
                            @elseif ($user->profile == null)
                                <img src="{{ asset('images/noprofileimage.jpg') }}" class="image-middle mx-auto">
                                <h4>-{{ $user->name }}-</h4>
                            @endif
                            <hr>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="card mt-3 shadow-sm">
                <div class="card-header">
                    <h3><i class="far fa-paper-plane"></i> contact</h3>
                </div>
                <a href="{{ action('ContactController@add') }}" class="card-body text-center btn btn-secondary m-4">
                    <p class="card-text col-md-12 text-center">
                        -お問い合わせはこちらから-
                    </p>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
