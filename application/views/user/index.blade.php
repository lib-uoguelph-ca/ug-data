<div class="user-index">
	<table class="user-list">
	<thead>
		<tr>
			<th>User Name</th>
			<th>E-Mail</th>
			<th>Created</th>
			<th>Updated</th>
			<th>Admin</th>
		</tr>
	</thead>
	@foreach ($users->results as $user)
	    <tr>
	    	<td><a href="/admin/user/view/{{ $user->id }}" class="user-username">{{ $user->username }}</a></td>
	    	<td>{{ $user->email }}</td>
	    	<td>{{ $user->created_at }}</td>
	    	<td>{{ $user->updated_at }}</td>
	    	<td>{{ $user->admin }}</td>
	    </tr>
	@endforeach
	</table>
	{{ $users->links(); }}
</div>

