<?php 

use Titon\Utility\Sanitize as Sanitize;

class Dataset_Controller extends Base_Controller {
	
	public $layout = 'layouts.default';

	/**
	 * Index action:
	 * 
	 * URL: datasets, dataset, dataset/(int)
	 */
	public function action_index() {
		$this->layout->title = "UG-Data Search";
		$this->layout->subtitle = "Datasets";

		//Build the contextual links.
		$context_links = array(
			HTML::link(URL::to_action('dataset@add'), 'Add Dataset'),
		);
		$this->layout->contextual = $context_links;
		
		$items_per_page = 5;
		$datasets = DB::table('datasets')
			->order_by('name', 'asc')
			->paginate($items_per_page);
		
		foreach($datasets->results as $ds) {
			$short_description = Str::limit($ds->description, 1000);
			
			$config = HTMLPurifier_Config::createDefault();
			$purifier = new HTMLPurifier($config);
			$short_description = $purifier->purify($short_description);
			
			$ds->short_description = $short_description;		
		}
		
		$view = View::make('dataset.index');
		$view->datasets = $datasets;
		
		$this->layout->content = $view;
	}
	
	/**
	 * View action.
	 *
	 * Displays a summary view of a dataset.
	 *
	 * @param $id
	 */
	public function action_view($id) {
		$dataset = Dataset::find($id);
		if($dataset == Null) {
			return Response::error('404');
		}

		//Build the contextual links.
		$context_links = array(
			HTML::link(URL::to_action('dataset@fullview', array($id)), 'Full View'),
		);
		if($dataset->is_owner()) {
			$context_links[] = HTML::link(URL::to_action('dataset@edit', array($id)), 'Edit');
		}
		if(Auth::check() && Auth::user()->admin) {
			$context_links[] = HTML::link(URL::to_action('dataset@delete', array($id)), 'Delete');
		}
		$this->layout->contextual = $context_links;
		
		$this->layout->title = "UG-Data Search";
		$this->layout->subtitle = $dataset->name;
			
		$view = View::make('dataset.view');
		$view->dataset = $dataset;
			
		$this->layout->content = $view;
	}
	
	/**
	 * Full view action.
	 * 
	 * Displays the dataset along with all associated attributes. 
	 *  
	 * @param $id
	 */
	public function action_fullview($id) {
			
		$dataset = Dataset::find($id);
		if($dataset == Null) {
			return Response::error('404');
		}

		//Build the contextual links.
		$context_links = array(
			HTML::link(URL::to_action('dataset@view', array($id)), 'View'),
		);
		if($dataset->is_owner()) {
			$context_links[] = HTML::link(URL::to_action('dataset@edit', array($id)), 'Edit');
		}
		if(Auth::check() && Auth::user()->admin) {
			$context_links[] = HTML::link(URL::to_action('dataset@delete', array($id)), 'Delete');
		}
		$this->layout->contextual = $context_links;
		
		$this->layout->title = "UG-Data Search";
		$this->layout->subtitle = $dataset->name;
			
		$view = View::make('dataset.fullview');
		$view->dataset = $dataset;
			
		$this->layout->content = $view;
	}
	
	/**
	 * Add action
	 * 
	 * Add a dataset to the database.
	 * URL: dataset/add
	 */
	public function action_add() {
		
		$this->layout->title = "UG-Data Search";
		$this->layout->subtitle = "Describe your data";
		
		$view = View::make('dataset.add');
		$submission = Input::all();

		$dv = new DefaultValue($submission);
		$view->input = $dv;
		
		//Initial visit to the add form. 
		if(empty($submission)) {
			
		}
		//Handle submitted form data.
		else {
			$valid = Dataset::validate(Util::inputStripPrefix($submission));
			
			if($valid !== true) {
				Session::flash('status', 'error');
				Session::flash('status-msg', $valid->all());
			}
			else {
				$user = Auth::user();
				$dataset = new Dataset();
				
				//Owner
				$dataset->user_id = $user->id;

				//Name
				$dataset->name = Sanitize::escape($submission["dataset_name"]);
				
				//Url
				$url = Sanitize::url($submission["dataset_url"]);
				if (!preg_match('#(http://|https://)#', $url)) {
					$url = "http://" . $url;
				}
				$dataset->url = $url;

				//Description
				$config = HTMLPurifier_Config::createDefault();
				$purifier = new HTMLPurifier($config);
				$dataset->description = $purifier->purify($submission["dataset_description"]);
				
				//Save the dataset and the attributes all in one go. 
				try {
					$dataset->setAttributes($this->getAttributesFromInput(Util::inputStripEmpty($submission)));
					$dataset->save();
					
					return Redirect::to_action('dataset@index',  array($dataset->id))
						->with('status', 'success')
						->with('status-msg', 'Success! Dataset added.');
				}
				catch (Exception $e) {
					Session::flash('status', 'error');
					Session::flash('status-msg', "Error. Something went wrong when inserting your values into the database. Please contact an administrator.");
				}
			}
		} 
		
		$this->layout->content = $view;
	}
	
	/**
	 * Edit action
	 * 
	 * Edit a dataset that exists in the database.
	 * URL: dataset/edit/(int)
	 * 
	 * @param 	$id	The id of the dataset to edit.
	 */
	public function action_edit($id) {
		$this->layout->title = "UG-Data Search";
		$this->layout->subtitle = "Describe your data";
		
		$dataset = Dataset::find($id);
		if($dataset == Null) {
			return Response::error('404');
		}
		if(!$dataset->is_owner()) {
			return Response::error('403');
		}
		
		//Build the contextual links.
		$context_links = array(
			HTML::link(URL::to_action('dataset@view', array($id)), 'View'),
			HTML::link(URL::to_action('dataset@fullview', array($id)), 'Full View'),
		);
		if(Auth::check() && Auth::user()->admin) {
			$context_links[] = HTML::link(URL::to_action('dataset@delete', array($id)), 'Delete');
		}
		$this->layout->contextual = $context_links;

		$submission = Input::all();
		
		$view = View::make('dataset.edit');
		$view->id = $id;

		//Initial visit to the edit form.
		if(empty($submission)) {
			//Pass the loaded values to the edit form.
			$dv = new DefaultValue($dataset);
			$view->input = $dv;
		}
		//Handle submitted form data.
		else {
			$dv = new DefaultValue(Util::inputStripPrefix($submission));
			$view->input = $dv;
			
			$valid = Dataset::validate(Util::inputStripPrefix($submission));
				
			if($valid !== true) {
				Session::flash('status', 'error');
				Session::flash('status-msg', $valid->all());
			}
			else {
				//Name
				$dataset->name = Sanitize::escape($submission["dataset_name"]);
		
				//Url
				$url = Sanitize::url($submission["dataset_url"]);
				if (!preg_match('#(http://|https://)#', $url)) {
					$url = "http://" . $url;
				}
				$dataset->url = $url;
				$dataset->updated_at = NULL;
		
				//Description
				$config = HTMLPurifier_Config::createDefault();
				$purifier = new HTMLPurifier($config);
				$dataset->description = $purifier->purify($submission["dataset_description"]);
				
				//Save everything in one go. 
				try {
					$dataset->setAttributes($this->getAttributesFromInput(Util::inputStripEmpty($submission)));
					$dataset->save();
				
					return Redirect::to_action('dataset@index',  array($id))
						->with('status', 'success')
						->with('status-msg', 'Success! Dataset updated.');
				}
				catch (Exception $e) {
					Session::flash('status', 'error');
					Session::flash('status-msg', "Error. Something went wrong when inserting your values into the database. Please contact an administrator.");
					throw $e;
				}
				
			}
		}
		
		$this->layout->content = $view;
	}
	
	/**
	 * Delete action
	 * 
	 * Deletes a dataset.
	 * 
	 * @param unknown_type $id
	 */
	public function action_delete($id) {
		$this->layout->title = "UG-Data Search";
		$this->layout->subtitle = "Confirm Delete?";
		
		$dataset = Dataset::find($id);
		if($dataset == Null) {
			return Response::error('404');
		}

		if(!Auth::user()->admin) {
			return Response::error('403');
		}

		$this->layout->contextual = array(
			HTML::link(URL::to_action('dataset@view', array($id)), 'View'),
			HTML::link(URL::to_action('dataset@fullview', array($id)), 'Full View'),
			HTML::link(URL::to_action('dataset@edit', array($id)), 'Edit'),			
		);
		
		$submission = Input::all();
	
		//Initial Visit
		if(empty($submission)) {
			
		}
		//Process submission.
		else {
			//If the user clicked the confirm button.
			if(isset($submission['dataset_delete_confirm'])) {
				try {
					/* We've got cascading deletes set up for the attributes table. 
					 * So we only have to delete the dataset.
					 */
					$dataset->delete();
					return Redirect::to_action('dataset@index')
					->with('status', 'success')
					->with('status-msg', 'Success! Dataset deleted.');
				}
				catch(Exception $e) {
					Session::flash('status', 'error');
					Session::flash('status-msg', "Error. Something went wrong when inserting your values into the database. Please contact an administrator.");
				}
			}
			//The user clicked the cancel button.
			else {
				return Redirect::to_action('dataset@index');
			}
		}
		
		$view = View::make('dataset.delete');
		$view->id = $id;
		$this->layout->content = $view;
	}
	
	/*
	 * Non-Public functions
	 */
	
	/**
	 * Returns an array of the attributes from the user input.
	 * 
	 * Each attribute is returned in an array:
	 * 	array('name' => 'foo', 'value' => 'bar');
	 * 
	 * Multivalue attributes get one array element per value
	 *  
	 * @param array $input
	 */
	protected function getAttributesFromInput(array $input) {
		$attributes = array();
		$invalid_prefixes = array("", "dataset", "csrf");
		foreach($input as $field => $val) {
			$prefix = Util::getFieldPrefix($field);
				
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