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
			<h2>Discover your data</h2>

		</header>
		<div role="main" class="main">
			<div class="home">				
				<form action="" method="Post">
					<div id="basicSearch">
						<label for="searchbox">Search</label>
						<input type="text" name="keywords" />
						<div>
						<label for="ontology">Advanced Search</label>
							<select id="ontology-select" name="ontology">
								<option selected disabled value="0">Select an Ontology</option>
								<option value="ont1">EXPO</option>
								<option value="ont2">MicrO</option>
							</select>
						</div>
					</div>
					<div id="advancedSearch" style="background-color: #F5F5F5; border-radius: 15px; padding: 0px 0.5em;">
						{{ View::make('search.ont1')->render() }}
						{{ View::make('search.ont2')->render() }}
					</div>
					<input type="submit" value="Search" />
				</form>
				
				@if ($results == TRUE)
				<div id="results">
					<p>Your search: {{ $query }}</p>
					<p>With the following ontology: {{ $ontology }}</p>
				</div>
				@endif 
				
				
			</div>
		</div>
	</div>
</body>
</html>
