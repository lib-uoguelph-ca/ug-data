
<div role="main" class="main">
	<div class="home">
		<table>
		@foreach ($attributes as $attribute)
			<tr id="{{ $attribute->name }}">
		    <td>{{ $attribute->name }}</td>
		    <td>{{ $attribute->value }}</td>
			</tr>
		@endforeach
		
		</table>
	</div>
</div>
