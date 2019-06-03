@extends('layouts.admin_app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if ($user->profile != null)
                <div class="image col-md-8 mx-auto">
                    @if ($user->profile->image_path != null)
                        <img src="{{ $user->profile->image_path }}" class="image-profile mx-auto">
                    @else
                        <img src="{{ asset('images/noprofileimage.jpg') }}" class="image-profile mx-auto">
                    @endif
                </div>
                <div class="col-md-10 mx-auto">
                    <br>
                    <hr size="3" color="gray">
                    <p>name：{{ $user->profile->name }}</p>
                    <hr size="3" color="gray">
                    <p>introduction：{{ $user->profile->introduction }}</p>
                    <hr size="3" color="gray">
                </div>
            @else
                <div class="image col-md-8 mx-auto">
                    <img src="{{ asset('images/noprofileimage.jpg') }}" class="image-profile mx-auto">
                </div>
                <div class="col-md-10 mx-auto">
                    <br>
                    <hr size="3" color="gray">
                    <p>名前：{{ $user->name }}</p>
                    <hr size="3" color="gray">
                    <p>※詳細プロフィールの設定がまだありません。</p>
                    <hr size="3" color="gray">
                </div>
                <div class="col-md-8 mx-auto text-right">
                    <a href="{{ action('Admin\ProfileController@add') }}" role='button' class='btn btn-success'>新規作成</a>
                </div>
            @endif
        </div>
    </div>
    <hr>
</div>
@endsection
