<div id="user-delete">
		
	<p>Are you sure that you want to to delete this user? Once you do, there's no going back!</p>
	{{ Form::open('admin/user/delete/' . $id, 'POST');  }}
		{{ Form::token(); }}
		
		{{ Form::button('Delete User', array('name' => 'user_delete_confirm', 'value' => 'Delete')); }}
		{{ Form::button('Cancel', array('name' => 'user_delete_cancel', 'value' => 'Cancel')); }}
	{{ Form::close() }}
</div>

