<?php 

class Dataset_Controller extends Base_Controller {
	
	public $layout = 'layouts.default';

	public function action_index($id=null)
	{
		$this->layout->title = "UG-Data Search";
		
		if ($id == null) {
			$this->layout->subtitle = "Datasets";
			$datasets = Dataset::all();
			
			$view = View::make('dataset.index');
			$view->datasets = $datasets;
			
			$this->layout->content = $view;
		}
		else if (is_numeric($id))  {
			
			$dataset = Dataset::find($id);
			$this->layout->subtitle = $dataset->name;
			
			$attributes = $dataset->attributes()->get();
			
			$view = View::make('dataset.dataset');
			$view->dataset = $dataset;
			$view->attributes = $attributes;
			
			$this->layout->content = $view;			
		}
		
	}
}