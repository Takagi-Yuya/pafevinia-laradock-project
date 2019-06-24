@extends('layouts.nextpage_app')

@section('content')
<div class="container">
    <div class="row box m-5">
        <div class="col-md-10 mx-auto m-3">
            <form action="{{ action("ContactController@create") }}" method="post" enctype="multipart/form-data">
                @include('partials.errors.form_errors')
                <h2><i class="far fa-paper-plane"></i></h2>
                <div class="form-group row">
                    <label class="col-md-12 ws-nr" for="name"><span class="badge badge-danger">必須</span> 名前：</label>
                    <div class="col-md-12">
                        <input class="form-control" type="text" name="name" value="{{ old("name") }}" placeholder="ニックネームでも可">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-12 ws-nr" for="email"><span class="badge badge-danger">必須</span> メールアドレス：</label>
                    <div class="col-md-12">
                        <input class="form-control" type="email" name="email" value="{{ old("name") }}" placeholder="PC・携帯 共に可">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-12 ws-nr" for="content"><span class="badge badge-danger">必須</span> お問い合わせ内容：</label>
                    <div class="col-md-12">
                        <textarea class="form-control" name="content" rows="10">{{ old("content") }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-10 text-right">
                        @csrf
                        <input class="btn btn-primary" type="submit" value="送信">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
