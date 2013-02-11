<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>{{ $title }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="icon" type="image/png" href="/img/guelph.ico">

        @section('css')	
	        <link rel="stylesheet" href="/css/normalize.css">
	        <link rel="stylesheet" href="/css/main.css">
        @endsection
        @yield('css')
        
        <script src="/js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    
    <header>
    	<h1>{{ $title }}</h1>
    	<ul id="primary-links">
	    	@section('primary-links')
			    <li><a href="/">Home</a></li>
			@endsection
			@yield('primary-links')
		</ul>
    </header>
    
    <body>
    	<h2>{{ $subtitle }}</h2>
      	{{ $content }}
      	
      	@section('scripts')
			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
		    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.0.min.js"><\/script>')</script>
		    <script src="/js/plugins.js"></script>
		    <script src="/js/main.js"></script>
		    	
		    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
		    <script>
		        var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
		        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
		        g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		        s.parentNode.insertBefore(g,s)}(document,'script'));
		    </script>
		@endsection
		@yield('scripts')
    </body>
</html>