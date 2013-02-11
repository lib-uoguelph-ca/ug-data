
<div role="main" class="main">
	<div class="home">
		<ul>
		@foreach ($datasets as $dataset)
		    <li><a href="/dataset/{{ $dataset->id }}">{{ $dataset->name }}</a></li>
		@endforeach
		</ul>
	</div>
</div>
