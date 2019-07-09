<div class="row">
    <div class="col-md-12">
        <h3><i class="fas fa-bolt"></i> category</h4>
        <ul>
            @foreach ($categories as $category)
				    <li class="p-2">
                <a href="{{ action('Admin\CategoryController@index', ['id' => $category->id]) }}">{{ $category->name }}</a>
            </li>
            @endforeach
            <li class="p-2">
                <a href="{{ action('Admin\CategoryController@index') }}">その他</a>
            </li>
		    </ul>
	  </div>
</div>
