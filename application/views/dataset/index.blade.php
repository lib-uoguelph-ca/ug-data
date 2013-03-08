<div class="dataset-index">
	<ul class="dataset-list">
	@foreach ($datasets as $dataset)
	    <li>
	    	<a href="/dataset/{{ $dataset->id }}" class="dataset-name">{{ $dataset->name }}</a>
	    	<div class="dataset-description">{{ $dataset->description }}</div>
	    </li>
	@endforeach
	</ul>
</div>

