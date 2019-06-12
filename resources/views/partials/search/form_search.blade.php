<form id="form1" action="{{ action('SearchController@search') }}" method="get" class="form-inline">
    <div class="form-group">
        <input id="sbox1" type="text" name="keyword" value="{{ $keyword }}" placeholder="記事をキーワード検索">
        <button id="sbtn1" type="submit"><i class="fas fa-search"></i></button>
    </div>
</form>
