<div class="user-view">
	<table>
		<tr><td>Email: </td><td>{{ $user->email }}</td></tr>
		<tr><td>Created: </td><td>{{ $user->created_at }}</td></tr>
		<tr><td>Updated: </td><td>{{ $user->updated_at }}</td></tr>
		<tr><td>Admin: </td><td>{{ $user->admin }}</td></tr>
	</table>
</div>