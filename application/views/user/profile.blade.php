<div id="user-profile">
		
	{{ Form::open('/user/profile', 'POST');  }}
		{{ Form::token(); }}

		{{ Form::label('user_password', 'Password', array('class' => 'required')); }}
		{{ Form::password('user_password'); }}

		{{ Form::label('user_password_confirm', 'Password Confirm', array('class' => 'required')); }}
		{{ Form::password('user_password_confirm'); }}

		{{ Form::submit('Save profile'); }}
	{{ Form::close() }}
</div>