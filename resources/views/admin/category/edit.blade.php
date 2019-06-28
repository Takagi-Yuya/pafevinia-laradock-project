@extends('layouts.admin_app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h2>category / edit</h2>
            <br>
            <form action="{{ action("Admin\CategoryController@update") }}" method="post" enctype="multipart/form-data">
                @include('partials.errors.form_errors')
                <div class="form-group row">
                    <label class="col-md-10 ws-nr" for="name"><span class="badge badge-danger">Required</span> category name：</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="name" value="{{ $category_form->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-10 text-right">
                        <input type="hidden" name="id" value="{{ $category_form->id }}">
                            @csrf
                        <input class="btn btn-primary" type="submit" value="Done">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
