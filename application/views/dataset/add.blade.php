
@section('scripts')
	@parent
	<script src="/js/vendor/chosen/chosen.jquery.js"></script>
	<!-- <script src="/js/vendor/jquery.collapsibleFieldset.js"></script> -->

	<script src="/js/dataset-add.js"></script>
@endsection

@section('css')
	@parent
	<link href="/js/vendor/chosen/chosen.css" media="screen, projection" rel="stylesheet" type="text/css" />
@endsection

@if(!empty($status))
	<div id="status" class=" {{ $status }}">
		<ul class="message-list">
			@if (is_array($msg))
				@foreach ($msg as $m)
					<li class="msg">{{ $m }}</li>
				@endforeach
			@else 
				<li class="msg">{{ $msg }}</li>
			@endif
		</ul>
	</div>
@endif

<div id="dataset-add">
		
	<form action="" method="Post">
		<label for="dataset-name">
			<span>Name</span>
			<input type="text" name="dataset_name" id="dataset-name" />
		</label>
		
		<label for="dataset-url">
			<span>URL</span>
			<input type="text" name="dataset_url" id="dataset-url" />
		</label>
		
		<label for="dataset_description">
			<span>Description</span>
			<textarea rows="5" cols="50" name="dataset_description" id="dataset-description"></textarea>
		</label>
		
		<div id="ontologies" >
			{{ View::make('dataset.ontology.geopolitical')->render() }}
		</div>
		<input type="submit" value="Add Dataset" />
	</form>
</div>

