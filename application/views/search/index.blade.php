@section('scripts')
    @parent
    <script src="js/search.js"></script>
@endsection
<div id="search">       
    <form action="" method="Get">
    {{ Form::open('search', 'POST');  }}
        {{ Form::token(); }}
        <div id="basicSearch">
            {{ Form::label('search_keyword', 'Search'); }}
            {{ Form::text('search_keyword', $input['search_keyword']); }}
            <div>
                <h3>Advanced Search</h3>
                {{ Form::label('search_ontology', 'Select an Ontology'); }}
                {{ Form::select('search_ontology', array('' => '', 'geopolitical' => 'Geopolitical'), $input['search_ontology']); }}
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
    <h3>Search Results</h3>
    @if (isset($query_results))
    	<ol class="search-results"> 
        @foreach ($query_results->results as $result)
        	<li class="search-result">
            	{{ HTML::link('dataset/view/' . $result["id"], $result["name"]);}}
                <div class="search-highlihgt">
                    {{ $result["highlight"] }}
                </div>
            </li>
        @endforeach
        </ol>
        {{ $query_results->appends($submission)->links(); }}
    @endif
</div>
@endif 
