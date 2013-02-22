@section('scripts')
	@parent
	<script src="js/search.js"></script>
@endsection
<div id="search">		
	<form action="" method="Post">
		<div id="basicSearch">
			<label for="search-keyword">Search</label>
			<input type="text" id="search-keyword" name="search-keyword"/>
			<div>
				<label for="ontology-select">Advanced Search</label>
				<select id="ontology-select" name="ontology-select">
					<option selected disabled value="0">Select an Ontology</option>
					<option value="expo">Expo</option>
					<option value="geopolitical">Geopolitical</option>
					<option value="human_activities">Human Activities</option>
				</select>
			</div>
		</div>
		<div id="advancedSearch" >
			{{ View::make('search.geopolitical')->render() }}
			{{ View::make('search.expo')->render() }}
			{{ View::make('search.human_activities')->render() }}
		</div>
		<input type="submit" value="Search" />
	</form>
</div>
@if ($results == TRUE)
<div id="results">
	<p>Your search: {{ $query }}</p>
</div>
@endif 
