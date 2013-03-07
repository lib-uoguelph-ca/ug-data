<?php 

use Titon\Utility\Sanitize as Sanitize;
use Doana\DefaultValue;

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
			
			$view = View::make('dataset.dataset');
			$view->dataset = $dataset;
			
			$this->layout->content = $view;			
		}
		
	}
	
	public function action_add() {
		
		$this->layout->title = "UG-Data Search";
		$this->layout->subtitle = "Describe your data";
		
		$view = View::make('dataset.add');
		$submission = Input::all();

		$dv = new \Doana\DefaultValue\DefaultValue($submission);
		$view->input = $dv;
		
		//Initial visit to the add form. 
		if(empty($submission)) {
			
		}
		//Handle submitted form data.
		else {
			$valid = Dataset::validate($this->stripPrefix($submission));
			
			if($valid !== true) {
				$view->status = "error";
				$errors = $valid->all();
				$view->msg = $valid->all();
			}
			else {
				$dataset = new Dataset();
				$dataset->name = Sanitize::escape($submission["dataset_name"]);
				
				$url = Sanitize::url($submission["dataset_url"]);
				if (!preg_match('#(http://|https://)#', $url)) {
					$url = "http://" . $url;
				}
				$dataset->url = $url;
								
				$config = HTMLPurifier_Config::createDefault();
				$purifier = new HTMLPurifier($config);
				$dataset->description = $purifier->purify($submission["dataset_description"]);
				//$dataset->description = Sanitize::escape($submission["dataset_description"]);
					
				try {
					$dataset->save();			
					$dataset->attributes()->save($this->getAttributesFromInput($submission));
					
					$view->status = "success";
					$view->msg = "Success! We've added your dataset to our database. Please be patient while we update our search index.";
				}
				catch (Exception $e) {
					$view->status = "error";
					$view->msg = "Error. Something went wrong when inserting your values into the database. Please contact an administrator.";
				}
			}
		} 
		
		$this->layout->content = $view;
	}
	
	public function action_edit($id) {
		
	}
	
	protected function getFieldPrefix($field) {
		$start = 0;
		$end = strpos($field, '_');
		
		if($end == False) {
			return "";
		}
		
		return substr($field, $start, $end);
	}
	
	/*
	 * Strip the prefix from the field names in the array of submitted values.
	 */
	protected function stripPrefix($prefixed_input) {

		$input = array();
		foreach($prefixed_input as $key => $value) {
			$start = strpos($key,'_') + 1;
			$short_key = substr($key, $start);

			$input[$short_key] = $value;
		}
		
		return $input;
	}
	
	/*
	 * Returns an array of the attributes from the user input.
	 */
	protected function getAttributesFromInput($input) {
		$attributes = array();
		foreach($input as $field => $val) {
			$prefix = $this->getFieldPrefix($field);
				
			$invalid_prefixes = array("", "dataset", "csrf");
			if(!in_array($prefix, $invalid_prefixes)) {
				if(is_array($val)) {
					foreach($val as $v) {
						$attr = array();
						$attr['name'] = $field;
						$attr['value'] = Sanitize::escape($v);
						$attributes[] = $attr;
					}
				}
				else {
					$attributes[] = array('name' => $field, 'value' => Sanitize::escape($val));
				}
			}
		}
		
		return $attributes;	
	}
	
}