<?php

class Search_Controller extends Base_Controller {
    public $layout = 'layouts.default';

    /**
     * Index - Does exposes the search to the user, handles queries.
     */
    public function action_index()
    {
        $this->layout->title = "UG-Data Search";
        $this->layout->subtitle = "Discover your data";
                
        $view = View::make('search.index');
        
        $submission = Util::inputStripEmpty(Input::all());
        $dv = new DefaultValue($submission);
        $view->input = $dv;
        
        //$submission = Input::get();
        if(!empty($submission)) {        
            $solr = new Solr();

            $results = $solr->datasetSearch($submission);

            if(!empty($results)) {
                //Get the facets from our results.
                $facets = array();
                if(isset($results['query_facets'])) {
                    $facets = $results['query_facets'];
                    $view->facets = $facets;
                }
                
                //Pagination
                if(isset($results['query_results'])) {
                    $results = $results['query_results'];
                    $per_page = 10;
                    $results = Paginator::make($results, count($results), $per_page, FALSE);
                }

                //We have to unset the page parameter because the pager will add one iteself.
                if(isset($submission['page'])) {
                	unset($submission['page']);
                }
            }
            $view->has_results = TRUE;
            $view->submission = $submission;
            $view->results = $results;
            
        } 
        else {
            $view->has_results = FALSE;
        }
        
        $this->layout->content = $view;   
    }

}