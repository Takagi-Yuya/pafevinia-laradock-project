@extends('layouts.admin_app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h2>article / create</h2>
            <br>
            <form action="{{ action("Admin\ArticleController@create") }}" method="post" enctype="multipart/form-data">
                @include('partials.errors.form_errors')
                <div class="form-group row">
                    <label class="col-md-2 ws-nr" for="body"><span class="badge badge-danger">Required</span> title：</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="title" value="{{ old("title") }}" placeholder="例）自分が前職を辞めて留学した理由">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 ws-nr" for="body"><span class="badge badge-danger">Required</span> body：</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="body" rows="30" placeholder="例）私が新卒で入社した前職を約２年で辞めて留学した理由についてまとめて...">{{ old("body") }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="image">image：</label>
                    <div class="col-md-10">
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
