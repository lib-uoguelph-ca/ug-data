<table>
{{ $dataset->getAttribute('test1') }}

@foreach ($dataset->getSecondaryAttributes() as $name => $value)
	<tr id="{{ $name }}">
    <td>{{ $name }}</td>
    <td>{{ $value }}</td>
	</tr>
@endforeach
</table>
