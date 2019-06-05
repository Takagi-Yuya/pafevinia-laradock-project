@extends('layouts.admin_app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h2>pafevinia NEWS / create</h2>
            <br>
            <form action="{{ action("Admin\NewsController@create") }}" method="post" enctype="multipart/form-data">
                @include('partials.errors.form_errors')
                <div class="form-group row">
                    <label class="col-md-2 ws-nr" for="content"><span class="badge badge-danger">Required</span> content：</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="content" value="{{ old("content") }}" placeholder="例）英語に関する新規記事を作成しました！">
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
