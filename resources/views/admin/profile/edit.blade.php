@extends('layouts.admin_app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h2>profile / edit</h2>
            <br>
            <form action="{{ action("Admin\ProfileController@update") }}" method="post" enctype="multipart/form-data">
                @include('partials.errors.form_errors')
                <div class="form-group row">
                    <label class="col-md-3 ws-nr" for="name"><span class="badge badge-danger">Required</span> name：</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="name" value="{{ $profile_form->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 ws-nr" for="introduction"><span class="badge badge-danger">Required</span> introduction：</label>
                    <div class="col-md-9">
                        <textarea class="form-control" rows="10" name="introduction">{{ $profile_form->introduction }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 ws-nr" for="url_1">url_1：</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="url_1" value="{{ $profile_form->url_1 }}" placeholder="例）https://twitter.com/0201yu_ya">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 ws-nr" for="url_2">url_2：</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="url_2" value="{{ $profile_form->url_2 }}" placeholder="例）https://www.instagram.com/yanpi_0621/?hl=ja">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 ws-nr" for="url_3">url_3：</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="url_3" value="{{ $profile_form->url_3 }}" placeholder="例）https://www.facebook.com/yuya.takahi">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3" for="image">profile image：</label>
                    <div class="col-md-9">
                        <input type="file" class="form-control-file" name="image">
                        <div class="form-text text-info">
                            setting up：{{ $profile_form->image_path}}
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="remove" value="true">
                                ※Delete image
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-10 text-right">
                        <input type="hidden" name="user_id" value="{{ $profile_form->user_id }}">
                            @csrf
                        <input class="btn btn-primary" type="submit" value="Done">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
