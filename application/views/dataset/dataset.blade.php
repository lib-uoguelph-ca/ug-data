<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Laravel: A Framework For Web Artisans</title>
	<meta name="viewport" content="width=device-width">
	{{ HTML::style('laravel/css/style.css') }}
	{{ HTML::script('js/jquery.js') }}
	{{ HTML::script('js/search.js') }}
</head>
<body>
	<div class="wrapper">
		<header>
			<h1>UG-Data Search</h1>
			<h2>{{ $dataset->name }}</h2>
		</header>
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
	</div>
</body>
</html>
