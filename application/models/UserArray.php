<?php

/**
 * UserArray
 *
 * This class is designed to aid in creating an associative array representation of a Dataset.
 * This array can then can be used to populate a form.
 *
 * @author adam
 *
 */
class UserArray {

	protected $user;

	public function __construct(User $user) {
		$this->user = $user;
	}

	public function __toString() {
		return var_export($this->user);
	}

	public function build() {
		return array(
			'user_username' => $this->user->username,
			'user_email' => $this->user->email,
			'user_admin' => $this->user->admin,
		);
	}

}