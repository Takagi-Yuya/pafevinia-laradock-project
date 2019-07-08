<div class="row">
    <div class="col-md-12">
        <h3><i class="fas fa-bolt"></i> category</h4>
        <ul>
            @foreach ($categories as $category)
				    <li class="p-2">
                <a href="#">{{ $category->name }}</a>
            </li>
            @endforeach
		    </ul>
	  </div>
</div>
