<div id="dataset-delete">
		
	<p>Are you sure that you want to to delete this dataset? Once you do, there's no going back!</p>
	{{ Form::open('dataset/delete/' . $id, 'POST');  }}
		{{ Form::token(); }}
		
		{{ Form::button('Delete Dataset', array('name' => 'dataset_delete_confirm', 'value' => 'Delete')); }}
		{{ Form::button('Cancel', array('name' => 'dataset_delete_cancel', 'value' => 'Cancel')); }}
	{{ Form::close() }}
</div>

