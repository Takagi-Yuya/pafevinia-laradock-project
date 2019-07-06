@extends('layouts.admin_app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h2>article / edit</h2>
            <br>
            <form action="{{ action("Admin\ArticleController@update") }}" method="post" enctype="multipart/form-data">
                @include('partials.errors.form_errors')
                <div class="form-group row">
                    <label class="col-md-2 ws-nr" for="title"><span class="badge badge-danger">Required</span> title：</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="title" value="{{ $article_form->title }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 ws-nr" for="body"><span class="badge badge-danger">Required</span> body：</label>
                    <div class="col-md-10">
                        <textarea class="form-control" rows="30" name="body">{{ $article_form->body }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="image">image：</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control-file" name="image">
                        <div class="form-text text-info">
                            setting up：{{ $article_form->image_path}}
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
                    <label class="col-md-2" for="category">category：</label>
                    <div class="col-md-10">
                        <select name="category_id">
                            @if ($article_form->category_id != null)
                                <option value="{{ $article_form->category_id }}">{{ $article_form->category->name }}</option>
                            @else
                                <option value=""></option>
                            @endif
                            @foreach ($categories_form as $category_form)
                                <option value="{{ $category_form->id }}">{{ $category_form->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-10 text-right">
                        <input type="hidden" name="id" value="{{ $article_form->id }}">
                            @csrf
                        <input class="btn btn-primary" type="submit" value="Done">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
