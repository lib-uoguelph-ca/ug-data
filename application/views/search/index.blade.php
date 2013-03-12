@section('scripts')
	@parent
	<script src="js/search.js"></script>
@endsection
<div id="search">		
	<form action="" method="Post">
		<div id="basicSearch">
			<label for="search-keyword"><span>Search</span>
				<input type="text" id="search-keyword" name="search-keyword"/>
			</label>
			<div>
				<label for="ontology-select"><span>Advanced Search</span>
					<select id="ontology-select" name="ontology-select">
						<option selected disabled value="0">Select an Ontology</option>
						<option value="geopolitical">Geopolitical</option>
					</select>
				</label>
			</div>
		</div>
		<div id="advancedSearch" >
			{{ render('search.ontology.geopolitical', array('input' => $input)); }}
		</div>
		<input type="submit" value="Search" />
	</form>
</div>
@if ($results == TRUE)
<div id="results">
	<p>Your search: {{ $query }}</p>
</div>
@endif 
