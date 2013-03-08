
@section('scripts')
	@parent
	<script src="/js/vendor/chosen/chosen.jquery.js"></script>
	<script src="/js/vendor/nicEdit/nicEdit.js" type="text/javascript"></script>
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
		
	<!-- <form action="" method="Post"> -->
	{{ Form::open('dataset/edit/' . $id, 'POST');  }}
		{{ Form::token(); }}
		
		{{ Form::label('dataset_name', 'Name', array('class' => 'required')); }}
		{{ Form::text('dataset_name', $input['dataset_name']); }}
		
		{{ Form::label('dataset_url', 'URL', array('class' => 'required')); }}
		{{ Form::text('dataset_url', $input['dataset_url']); }}
		
		{{ Form::label('dataset_description', 'Description'); }}
		{{ Form::textarea('dataset_description', $input['dataset_description']); }}
		
		<div id="ontologies" >
			{{ render('dataset.ontology.geopolitical', array('input' => $input)); }}
		</div>
		
		{{ Form::submit('Save Dataset'); }}
		<!-- <input type="submit" value="Add Dataset" /> -->
	{{ Form::close() }}
</div>

