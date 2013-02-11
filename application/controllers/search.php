<?php

class Search_Controller extends Base_Controller {
	public $layout = 'layouts.default';


	
	public function action_index()
	{
		$this->layout->title = "UG-Data Search";
		$this->layout->subtitle = "Discover your data";
		/*
		$all = Input::get();
		var_dump($all);
		*/
		
		$keywords = Input::get('keywords');
		$ontology = Input::get('ontology');
		
		$view = View::make('search.index');
		
		if(!empty($keywords)) {
			$view->results = TRUE;
			$view->query = $keywords;
			$view->ontology = $ontology;
		} 
		else {
			$view->results = FALSE;
		}
		
		$this->layout->content = $view;
		
	}

}