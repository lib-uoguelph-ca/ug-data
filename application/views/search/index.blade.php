@section('scripts')
	@parent
	<script src="js/search.js"></script>
@endsection
		
<form action="" method="Post">
	<div id="basicSearch">
		<label for="searchbox">Search</label>
		<input type="text" name="keywords" />
		<div>
		<label for="ontology">Advanced Search</label>
			<select id="ontology-select" name="ontology">
				<option selected disabled value="0">Select an Ontology</option>
				<option value="ont1">EXPO</option>
				<option value="ont2">MicrO</option>
			</select>
		</div>
	</div>
	<div id="advancedSearch" style="background-color: #F5F5F5; border-radius: 15px; padding: 0px 0.5em;">
		{{ View::make('search.ont1')->render() }}
		{{ View::make('search.ont2')->render() }}
	</div>
	<input type="submit" value="Search" />
</form>

@if ($results == TRUE)
<div id="results">
	<p>Your search: {{ $query }}</p>
	<p>With the following ontology: {{ $ontology }}</p>
</div>
@endif 
