<?php

class Search_Controller extends Base_Controller {
    public $layout = 'layouts.default';

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
            
            //Pagination
            $per_page = 10;
            $results = Paginator::make($results, count($results), $per_page, FALSE);
            
            //We have to unset the page parameter because the pager will add one iteself.
            if(isset($submission["page"])) {
            	unset($submission["page"]);
            }
            
            $view->results = TRUE;
            $view->submission = $submission;
            $view->query_results = $results;
        } 
        else {
            $view->results = FALSE;
        }
        
        $this->layout->content = $view;   
    }

}