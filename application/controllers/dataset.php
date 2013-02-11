<?php 

class Dataset_Controller extends Base_Controller {

	public function action_index($id=null)
	{
		var_dump($id);
		if ($id == null) {
			$datasets = Dataset::all();
			
			$view = View::make('dataset.index');
			$view->datasets = $datasets;
			
			return $view;
		}
		else if (is_numeric($id))  {
			$dataset = Dataset::find($id);
			$attributes = $dataset->attributes()->get();
			
			$view = View::make('dataset.dataset');
			$view->dataset = $dataset;
			$view->attributes = $attributes;
			
			return $view;			
		}
		
	}
}