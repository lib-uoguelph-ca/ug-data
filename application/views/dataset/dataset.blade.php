<table>
@foreach ($attributes as $attribute)
	<tr id="{{ $attribute->name }}">
    <td>{{ $attribute->name }}</td>
    <td>{{ $attribute->value }}</td>
	</tr>
@endforeach
</table>