<table>


@foreach ($dataset->getSecondaryAttributes() as $attr)
	<tr id="{{ $attr['name'] }}">
    <td>{{ $attr['name'] }}</td>
    <td>{{ $attr['value'] }}</td>
	</tr>
@endforeach
</table>
