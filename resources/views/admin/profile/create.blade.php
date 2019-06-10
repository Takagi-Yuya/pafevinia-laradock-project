@extends('layouts.admin_app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h2>profile / create</h2>
            <br>
            <form action="{{ action("Admin\ProfileController@create") }}" method="post" enctype="multipart/form-data">
                @include('partials.errors.form_errors')
                <div class="form-group row">
                    <label class="col-md-3 ws-nr" for="name"><span class="badge badge-danger">Required</span> name：</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="name" value="{{ old("name") }}" placeholder="例）ズィーブラ">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 ws-nr" for="introduction"><span class="badge badge-danger">Required</span> introduction：</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="introduction" rows="10" placeholder="例）ゼブラはシマウマです。はい。そんな事は百も承知です。">{{ old("introduction") }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 ws-nr" for="url_1">url_1：</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="url_1" value="{{ old("url_1") }}" placeholder="例）https://twitter.com/0201yu_ya">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 ws-nr" for="url_2">url_2：</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="url_2" value="{{ old("url_2") }}" placeholder="例）https://www.instagram.com/yanpi_0621/?hl=ja">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 ws-nr" for="url_3">url_3：</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="url_3" value="{{ old("url_3") }}" placeholder="例）https://www.facebook.com/yuya.takahi">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3" for="image">profile image：</label>
                    <div class="col-md-9">
                        <input type="file" class="form-control-file" name="image">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-10 text-right">
                        @csrf
                        <input class="btn btn-primary" type="submit" value="Done">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
