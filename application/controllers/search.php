<?php

class Search_Controller extends Base_Controller {

	public function action_index()
	{
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
		
		return $view;
		
	}

}