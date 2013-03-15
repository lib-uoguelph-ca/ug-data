<?php

class Util {
	
	/**
	 * Given a field name, return the prefix used for that field.
	 * 
	 * Prefixes are divided using an underscore.
	 * Eg. Given 'foo_bar' this function returns 'foo' 
	 * 
	 * @param string $field
	 * @return string
	 */
	public static function getFieldPrefix($field) {
		$start = 0;
		$end = strpos($field, '_');
		
		if($end == False) {
			return "";
		}
		
		return substr($field, $start, $end);
	}

	public static function stripFieldPrefix($field) {
		$start = strpos($field,'_') + 1;
		return substr($field, $start);
	}
	
	/**
	 * Strip the prefix from the field names in the array of submitted values.
	 * 
	 * @param 	array 	$prefixed_input		An array of input values as passed from 
	 * 								 		the submitted form.
	 * 
	 * @return array	
	 */
	public static function inputStripPrefix(array $prefixed_input) {

		$input = array();
		foreach($prefixed_input as $key => $value) {
			$short_key = self::stripFieldPrefix($key);
			$input[$short_key] = $value;
		}
		return $input;
	}

	/**
	 * Strip empty values from form input.
     * 
     * @param 	array 	$input 	An array of values from a form.
	 */
	public static function inputStripEmpty(array $input) {
        foreach ($input as $key => $param ) {
            if (empty($param)) {
                unset($input[$key]);
            }
        }
        
        return $input;
    }
}