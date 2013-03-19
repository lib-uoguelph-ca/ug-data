<?php

use Titon\Utility\Sanitize as Sanitize;

class User_Controller extends Base_Controller {
	public $layout = 'layouts.default';

	/**
	 * Login action. 
	 * 
	 * URL: /login
	 */ 
	public function action_login() {
		
		$submission = Input::all();

		//User is already logged in.
		if (Auth::check()) {
		     return Redirect::home()
     			->with('status', 'success')
				->with('status-msg', 'Welcome!.');
		}

		//Initial visit to the login form.
		if(empty($submission)) {
					
		}
		
		//Handle submitted form data. 
		else {
			if(isset($submission['username']) && isset($submission['password'])) {
				$credentials = array(
					'username' => $submission['username'],
					'password' => $submission['password']
	 			);
				Auth::attempt($credentials);			
			}

			if (Auth::check()) {
			     return Redirect::home()
	     			->with('status', 'success')
					->with('status-msg', 'Welcome!.');
		}
			else {
				Session::flash('status', 'error');
				Session::flash('status-msg', "Bad login / password. Please try again.");
			}
		}
		
		$this->layout->title = "UG-Data Search";
		$this->layout->subtitle = "Log In";

		$view = View::make('user.login');		
		$this->layout->content = $view;

	}

	/**
	 * Logout action
	 * 
	 * URL: /logout 
	 */
	public function action_logout() {
		if(Auth::check()) {
			Auth::logout();
		}

		return Redirect::home();

	}

	/**
	 * Profile action. 
	 * 
	 * Edit your user profile.
	 * URL: /user/profile
	 */
	public function action_profile() {
		$this->layout->title = "UG-Data Search";
		$this->layout->subtitle = "Edit Profile";
		
		$user = Auth::user();
		if($user == Null) {
			return Response::error('404');
		}
		
		$submission = Input::all();
		$view = View::make('user.profile');
		
		//Initial visit to the add form. 
		if(empty($submission)) {
			
		}

		//Handle submitted form data.
		else {
			$submission["user_username"] = $user->username;
			$submission["user_email"] = $user->email;
			$submission["user_admin"] = $user->admin;

			$valid = User::validate_edit(Util::inputStripPrefix($submission));

			//User didn't enter a password
			if(empty($submission["user_password"])) {
				return Redirect::to_action('user@profile')
						->with('status', 'error')
						->with('status-msg', 'Please enter a new password.');
			}

			//Password and password confirm do not match.
			else if($submission["user_password"] != $submission["user_password_confirm"])  {
				Session::flash('status', 'error');
				Session::flash('status-msg', "Password and Password Confirm fields do not match.");
			}

			//User object validation.
			else if($valid !== true) {
				Session::flash('status', 'error');
				Session::flash('status-msg', $valid->all());
			}

			//We're good to go. Update the user.
			else {
				$user->password = Hash::make($submission["user_password"]);
				
				//Save the user. 
				try {
					$user->save();
					
					return Redirect::to_action('user@profile')
						->with('status', 'success')
						->with('status-msg', 'Success! Profile updated.');
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
	 * Admin index action
	 * 
	 * URL: /admin/users
	 */
	public function action_admin_index() {
		$this->layout->title = "UG-Data Search";
		$this->layout->subtitle = "Users";

		$items_per_page = 20;
		$users = DB::table('users')
			->order_by('username', 'asc')
			->paginate($items_per_page);
		
		$view = View::make('user.index');
		$view->users = $users;
		
		$this->layout->content = $view;
	}

	/**
	 * Admin user view
	 * 
	 * URL: /admin/user/view/{int}
	 */
	public function action_admin_view($id) {
		$user = User::find($id);
		if($user == Null) {
			return Response::error('404');
		}
		
		$this->layout->title = "UG-Data Search";
		$this->layout->subtitle = $user->username;
			
		$view = View::make('user.view');
		$view->user = $user;
		
		$this->layout->content = $view;
	}

	/**
	 * Admin user add action.
	 * 
	 * URL: /admin/user/add
	 */
	public function action_admin_add() {
		$this->layout->title = "UG-Data Search";
		$this->layout->subtitle = "Add User";

		$view = View::make('user.add');
		$submission = Input::all();

		$dv = new DefaultValue($submission);
		$view->input = $dv;
		
		//Initial visit to the add form. 
		if(empty($submission)) {
			
		}

		//Handle submitted form data.
		else {
			$valid = User::validate_add(Util::inputStripPrefix($submission));

			if($submission["user_password"] != $submission["user_password_confirm"])  {
				Session::flash('status', 'error');
				Session::flash('status-msg', "Password and Password Confirm fields do not match.");
			}
			else if($valid !== true) {
				Session::flash('status', 'error');
				Session::flash('status-msg', $valid->all());
			}
			else {
				$user = new User();
				
				//Name
				$user->username = Sanitize::escape($submission["user_username"]);
				$user->email = Sanitize::escape($submission["user_email"]);
				if(!empty($submission["user_password"])) {
					$user->password = Hash::make($submission["user_password"]);
				}
				if(isset($submission['user_admin']) && $submission['user_admin'] == "true") {
					$user->admin = TRUE;
				}
				else {
					$user->admin = FALSE;
				}
				
				//Save the user. 
				try {
					$user->save();
					
					return Redirect::to_action('user@admin_index')
						->with('status', 'success')
						->with('status-msg', 'Success! User added.');
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
	 * Admin user edit action.
	 * 
	 * URL: /admin/user/edit/{int}
	 */
	public function action_admin_edit($id) {
		$this->layout->title = "UG-Data Search";
		$this->layout->subtitle = "Edit User";

		$user = User::find($id);

		if($user == Null) {
			return Response::error('404');
		}

		$view = View::make('user.edit');
		$submission = Input::all();

		$view->id = $id;

		//Initial visit to the add form. 
		if(empty($submission)) {
			$dv = new DefaultValue($user);
			$view->input = $dv;
		}
		//Handle submitted form data.
		else {
			$dv = new DefaultValue($submission);
			$view->input = $dv;

			$valid = User::validate_edit(Util::inputStripPrefix($submission));

			//Submitted passwords must match
			if($submission["user_password"] != $submission["user_password_confirm"])  {
				Session::flash('status', 'error');
				Session::flash('status-msg', "Password and Password Confirm fields do not match.");
			}

			//User object validation.
			else if($valid !== true) {
				Session::flash('status', 'error');
				Session::flash('status-msg', $valid->all());
			}

			//Okay, we're good to go.
			else {
				$user->username = Sanitize::escape($submission["user_username"]);
				$user->email = Sanitize::escape($submission["user_email"]);
				$user->password = Hash::make($submission["user_password"]);

				if(isset($submission['user_admin']) && $submission['user_admin'] == "true") {
					$user->admin = TRUE;
				}
				else {
					$user->admin = FALSE;
				}
				
				//Save the user. 
				try {
					$user->save();
					
					return Redirect::to_action('user@admin_index')
						->with('status', 'success')
						->with('status-msg', 'Success! User added.');
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
	 * Admin user delete action.
	 * 
	 * URL: /admin/user/delete/{int}
	 */
	public function action_admin_delete($id) {
		$this->layout->title = "UG-Data Search";
		$this->layout->subtitle = "Confirm Delete User?";
		
		$user = User::find($id);
		if($user == Null) {
			return Response::error('404');
		}
		
		$submission = Input::all();
	
		//Initial Visit
		if(empty($submission)) {
			
		}
		//Process submission.
		else {
			//If the user clicked the confirm button.
			if(isset($submission['user_delete_confirm'])) {
				try {
					/* We've got cascading deletes set up for the attributes table. 
					 * So we only have to delete the dataset.
					 */
					$user->delete();
					return Redirect::to_action('user@admin_index')
					->with('status', 'success')
					->with('status-msg', 'Success! User deleted.');
				}
				catch(Exception $e) {
					Session::flash('status', 'error');
					Session::flash('status-msg', "Error. Something went wrong when inserting your values into the database. Please contact an administrator.");
				}
			}
			//The user clicked the cancel button.
			else {
				return Redirect::to_action('user@admin_index');
			}
		}
		
		$view = View::make('user.delete');
		$view->id = $id;
		$this->layout->content = $view;
	}
}