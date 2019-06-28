@extends('layouts.admin_app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h2>category / create</h2>
            <br>
            <form action="{{ action("Admin\CategoryController@create") }}" method="post" enctype="multipart/form-data">
                @include('partials.errors.form_errors')
                <div class="form-group row">
                    <label class="col-md-10 ws-nr" for="name"><span class="badge badge-danger">Required</span> category name：</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="name" value="{{ old("name") }}" placeholder="例）English">
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
