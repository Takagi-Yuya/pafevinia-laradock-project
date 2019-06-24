@extends('layouts.admin_app')

@section('content')
<div class="container">
    <div class="row m-3">
        <div class="col-md-11 mx-auto">
          <h1><i class="far fa-paper-plane"></i> -contact list- </h1>
            @foreach ($contacts as $contact)
                <div class="card m-3 shadow-sm">
                    <div class="card-body">
                        <div class="col-md-12 mx-auto">
                            <p><small>お問い合わせ日</small>：{{ $contact->created_at->format('Y/m/d/D') }}</p>
                            <hr>
                            <p><small>名前</small>：{{ $contact->name }}</p>
                            <hr>
                            <p><small>メールアドレス</small>：{{ $contact->email }}</p>
                            <hr>
                            <p><small>内容</small>：{{ $contact->content }}</p>
                            <hr>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center"> <!-- 検索ボックス付けるなら appends(Request::all()) 必要？ -->
        {{ $contacts->links() }}
    </div>
</div>
@endsection
