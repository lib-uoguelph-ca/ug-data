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
                {{ Form::select('search_ontology', array(
                        '' => '', 
                        //'geopolitical' => 'Geopolitical', 
                        'scca' => i18n::t('scca'),
                        'cssc' => i18n::t('cssc'),
                        'opcg' => i18n::t('opcg'),
                    ), $input['search_ontology']); 
                }}
            </div>
        </div>
        <div id="advancedSearch" class="hidden">
            {{-- render('search.ontology.geopolitical', array('input' => $input)); --}}
            {{ render('search.ontology.scca', array('input' => $input)); }}
            {{ render('search.ontology.cssc', array('input' => $input)); }}
            {{ render('search.ontology.opcg', array('input' => $input)); }}
        </div>
        <input type="submit" value="Search" />
    </form>
</div>
@if ($has_results == TRUE)
<div id="search-results">
    <h3>Search Results</h3>
    
    @if (!empty($results))
        {{--Facets--}}
        @if (!empty($facets))
            <div class="facets">
                @foreach ($facets as $fieldname => $facetfield)
                    <div class="search-facet-field">
                        <span class="name">{{ i18n::t($fieldname) }}</span>
                        <ul>
                            @foreach($facetfield as $name => $value)
                                @if ($value > 0)
                                <li>
                                    <a href="{{ URL::full() . '&fq_' . $fieldname . '=' . $name}}">{{ i18n::t($name) }}</a>  [{{ $value }}]
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        @endif

        {{--Search Results--}}
        @if(!empty($results))
            <div class="results">
               	<ol class="search-results"> 
                @foreach ($results->results as $result)
                	<li class="search-result">
                    	{{ HTML::link('dataset/view/' . $result["id"], $result["name"]);}}
                        <div class="search-highlihgt">
                            {{ $result["highlight"] }}
                        </div>
                    </li>
                @endforeach
                </ol>
                {{ $results->appends($submission)->links(); }}
            </div>
        @endif
    @else 
        <p>Sorry, no results</p>
    @endif
    
</div>
@endif 
