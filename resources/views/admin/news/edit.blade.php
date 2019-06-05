@extends('layouts.admin_app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h2>pafevinia NEWS / edit</h2>
            <br>
            <form action="{{ action("Admin\NewsController@update") }}" method="post" enctype="multipart/form-data">
                @include('partials.errors.form_errors')
                <div class="form-group row">
                    <label class="col-md-2 ws-nr" for="content"><span class="badge badge-danger">Required</span> content：</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="content" rows="2" value="{{ $news_form->content }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-10 text-right">
                        <input type="hidden" name="id" value="{{ $news_form->id }}">
                            @csrf
                        <input class="btn btn-primary" type="submit" value="Done">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
