<?php 

class Dataset extends Eloquent {
	protected $_attributes = array();
	protected $input_attributes = array();
	
	public static $core_attr = array(
			
	);
	
	/**
	 * Is the current user the owner of this dataset?
	 * 
	 * @return boolean
	 */
	public function is_owner() {
		$user = Auth::user();
		if($user == NULL) {
			return FALSE;
		}

		if($this->get_key() == $user->id) {
			return TRUE;
		}

		if($user->admin) {
			return TRUE;
		}

		return FALSE;
	}

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
				$result[] = array('name' => $attrib->name, 'value' => $attrib->value);
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
	
	/**
	 * Takes user input and runs validation rules against the input values.
	 * 
	 * @param array $input Validation 
	 * @return type
	 *
	 */
	public static function validate($input) {
		$rules = array(
			'name'  => 'required|max:50',
			'url' => 'required|url',
		);

		$validation = Validator::make($input, $rules);
		
		if ($validation->fails()) {
			return $validation->errors;
		}
		
		return true;
		
	}

	/**
	 * save
	 * Override Eloquent save function to provide transparent Apache Solr integration.
	 */
	public function save() {
		$result = parent::save();
		
		//Now we've got to update the attributes
		//Start by deleting the existing ones.
		$attributes = $this->attributes()->get();
		foreach($attributes as $attribute) {
			$attribute->delete();
		}
		
		//Save the new attributes
		if(isset($this->input_attributes)) {
			$this->attributes()->save($this->input_attributes);
		}

		//Now add the whole thing to the Solr index.
		$doc = new DatasetSolrObject($this);
		$solr = new Solr();
		$solr->add($doc->build());

		return $result;

	}
	
	/**
	 * Set the attributes to be used in the save operation.
	 * @param array $attribs an array of Attributes.
	 */
	public function setAttributes($attribs) {
		$this->input_attributes = $attribs;
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