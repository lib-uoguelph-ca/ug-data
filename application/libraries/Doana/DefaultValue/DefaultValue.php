<?php 

namespace Doana\DefaultValue;

class DefaultValue implements \ArrayAccess {
	protected $input; 
	
	public function __construct($input) {
		$this->input = $input;	
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