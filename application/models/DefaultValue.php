<?php

/**
 * DefaultValue
 *
 * This class is designed to ease the process of passing default values to a view.
 *
 * It implements the ArrayAccess interface so it can be used as an array by the view,
 * yet it won't generate undefined index warnings when trying to access values that
 * don't have a default value.
 *
 * Instead, undefined indexes (indices?) will return an empty string.
 *
 * @author adam
 *
 */
class DefaultValue implements \ArrayAccess {
	protected $input;

	public function __construct($input) {
		if(is_array($input)) {
			$this->input = $input;
		}
		else if ($input instanceof Dataset) {
			$da = new DatasetArray($input);
			$this->input = $da->build($input);
		}
		else if ($input instanceof User) {
			$ua = new UserArray($input);
			$this->input = $ua->build($input);
		}
		else {
			throw new \InvalidArgumentException("This class only accepts constructor arguments of type: (array, Dataset).");
		}
	}

	public function __get($name) {
		if(isset($this->input[$name])) {
			return $this->input[$name];
		}
		else {
			return '';
		}
	}

	/*
	 * ArrayAccess interface
	*/

	/*
	 * Defaults should be read only so I'm not going to implement this.
	*/
	public function offsetSet($offset, $value) {

	}

	/*
	 * Check if an offset exists
	*/
	public function offsetExists($offset) {
		return isset($input[$offset]);
	}

	/*
	 * Defaults should be read only so I'm not going to implement this.
	*/
	public function offsetUnset($offset) {

	}

	/*
	 * Get the value stored at an offset
	*/
	public function offsetGet($offset) {
		if(isset($this->input[$offset])) {
			return $this->input[$offset];
		}
		else {
			return '';
		}
	}

}