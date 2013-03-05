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
						<option value="expo">Expo</option>
						<option value="geopolitical">Geopolitical</option>
						<option value="human_activities">Human Activities</option>
					</select>
				</label>
			</div>
		</div>
		<div id="advancedSearch" >
			{{ View::make('search.ontology.geopolitical')->render() }}
			{{ View::make('search.ontology.expo')->render() }}
			{{ View::make('search.ontology.human_activities')->render() }}
		</div>
		<input type="submit" value="Search" />
	</form>
</div>
@if ($results == TRUE)
<div id="results">
	<p>Your search: {{ $query }}</p>
</div>
@endif 
