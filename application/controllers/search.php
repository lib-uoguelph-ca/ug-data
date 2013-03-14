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
            $view->results = TRUE;
            $view->query = 'Your query';

            $solr = new Solr();
            $results = $solr->datasetSearch($submission);
            $view->query_results = $results;
        } 
        else {
            $view->results = FALSE;
        }
        
        $this->layout->content = $view;   
    }

}