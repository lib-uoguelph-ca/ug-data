<p class="desc">
	{{ $dataset->description }}
</p>

<a href="{{ $dataset->url }}">Go to dataset</a>

<h3>Secondary Attributes</h3>
<table>
@foreach ($dataset->getSecondaryAttributes() as $attr)
	<tr id="{{ $attr['name'] }}">
    <td>{{ $attr['name'] }}</td>
    <td>{{ $attr['value'] }}</td>
	</tr>
@endforeach
</table>
