<div class="dataset-index">
	<ul class="dataset-list">
	@foreach ($datasets->results as $dataset)
	    <li>
	    	<a href="/dataset/{{ $dataset->id }}" class="dataset-name">{{ $dataset->name }}</a>
	    	<div class="dataset-description">{{ $dataset->short_description }}</div>
	    </li>
	@endforeach
	</ul>
	
	{{ $datasets->links(); }}
</div>

