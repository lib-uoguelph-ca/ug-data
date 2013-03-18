<div id="user-add">
		
	{{ Form::open('admin/user/add', 'POST');  }}
		{{ Form::token(); }}
		
		{{ Form::label('user_username', 'Name', array('class' => 'required')); }}
		{{ Form::text('user_username', $input['user_username']); }}
		
		{{ Form::label('user_email', 'E-Mail', array('class' => 'required')); }}
		{{ Form::text('user_email', $input['user_email']); }}

		{{ Form::label('user_password', 'Password', array('class' => 'required')); }}
		{{ Form::password('user_password'); }}

		{{ Form::label('user_password_confirm', 'Password Confirm', array('class' => 'required')); }}
		{{ Form::password('user_password_confirm'); }}
		
		{{ Form::label('user_admin', 'Admin?'); }}
		{{ Form::checkbox('user_admin', 'true'); }}

		{{ Form::submit('Add User'); }}
	{{ Form::close() }}
</div>

