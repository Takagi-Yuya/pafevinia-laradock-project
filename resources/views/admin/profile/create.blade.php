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
