<?php 

class Dataset extends Eloquent {
	protected $_attributes = array();
	
	public static $core_attr = array(
		'replicates',
		'sample size',
	);
	
	/*
	 * Defines the has_many relationship between datasets and attributes.
	 */
	public function attributes()
	{
		return $this->has_many('Attribute');
	}
	
	/*
	 * Get a specific attribute value by name.
	 */
	public function getAttribute($name) {
		 
		$this->cacheAttributes();
		
		$values = array();
		foreach($this->_attributes as $attrib) {
			if($attrib->name == $name) {
				$values[] = $attrib->value;
			}			
		}
		
		return $values;
	}
	
	/*
	 * Gets the core attributes as an array. 
	 * Core attribute names are defined in Dataset::$core_attr 
	 */
	public function getCoreAttributes() {
		$this->cacheAttributes();
		
		$result = array();
		
		foreach ($this->_attributes as $attrib) {
			if(in_array($attrib->name, Dataset::$core_attr)) {
				$result[] = $attrib;
			}
		}
		
		return $result;		
	}

	/*
	 * Gets an array of attributes that are secondary.
	 * Core attribute names are defined in Dataset::$core_attr
	 */
	public function getSecondaryAttributes() {
		$this->cacheAttributes();
		
		$results = array();
		foreach ($this->_attributes as $attrib) {
			if(!in_array($attrib->name, Dataset::$core_attr)) {
				$results[] = array('name' => $attrib->name, 'value' => $attrib->value);
			}
		}
		
		return $results;		
	}
	
	/*
	 * Takes user input and runs validation rules against the input values.
	 */
	public static function validate($input) {
		$rules = array(
			'name'  => 'required|max:50',
			'url' => 'required|active_url',
		);
		
		$validation = Validator::make($input, $rules);
		
		if ($validation->fails()) {
			return $validation->errors;
		}
		
		return true;
		
	}
	
	/**********************PROTECTED**************************/
	
	/*
	 * Gets the attributes for this dataset, and stores them in 
	 * an associative array for easy retrieval later. 
	 */
	protected function cacheAttributes() {
		if (empty($this->_attributes)) {
			$attribs = $this->attributes()->order_by('name', 'asc')->get();
			foreach ($attribs as $attrib) {
				$this->_attributes[] = $attrib;
			}
		}
	}	
}