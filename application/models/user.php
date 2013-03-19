<?php 

class User extends Eloquent {
	

	/**
	 * Hasmany relationship bewtween users and datasets.
	 */
	public function datasets() {
        return $this->has_many('Datasets');
    }
	
	/**
	 * Takes user input and runs validation rules against the input values.
	 * 
	 * Validation is done for the add operation (password is required.)
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

	/**
	 * Takes user input and runs validation rules against the input values.
	 * 
	 * Validation is done for the edit operation (password is optional on edits.)
	 * 
	 * @param array $input Validation 
	 * @return type
	 *
	 */
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