<?php 

class User extends Eloquent {
	
	
	/**
	 * Takes user input and runs validation rules against the input values.
	 * 
	 * @param array $input Validation 
	 * @return type
	 *
	 */
	public static function validate_add($input) {
		$rules = array(
			'username'  => 'required|max:128',
			'email' => 'required|email|unique:users',
			'password' => 'required|max:128',
		);

		$validation = Validator::make($input, $rules);
		
		if ($validation->fails()) {
			return $validation->errors;
		}
		
		return true;
		
	}

	public static function validate_edit($input) {
		$rules = array(
			'username'  => 'required|max:128',
			'email' => 'required|email',
		);

		$validation = Validator::make($input, $rules);
		
		if ($validation->fails()) {
			return $validation->errors;
		}
		
		return true;
		
	}
}