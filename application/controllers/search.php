<?php

class Search_Controller extends Base_Controller {
	public $layout = 'layouts.default';

	public function action_index()
	{
		$this->layout->title = "UG-Data Search";
		$this->layout->subtitle = "Discover your data";
				
		$view = View::make('search.index');
		
		$all = $this->queryStripEmpty(Input::get());
		var_dump($all);
		if(!empty($all)) {
			$view->results = TRUE;
			$view->query = $all['search-keyword'];
			//$view->ontology = $ontology;
		} 
		else {
			$view->results = FALSE;
		}
		
		$this->layout->content = $view;
		
	}
	
	protected function queryStripEmpty($query_params) {
		foreach ($query_params as $key => $param ) {
			if (empty($param)) {
				unset($query_params[$key]);
			}
		}
		
		return $query_params;
	}

}