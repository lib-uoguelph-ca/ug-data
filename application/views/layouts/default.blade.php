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
	        <link href="/css/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
			<link href="/css/print.css" media="print" rel="stylesheet" type="text/css" />
			<!--[if IE]>
			    <link href="/css/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
			<![endif]-->
        @endsection
        @yield('css')
        
        <script src="/js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    @if (Auth::check())
	    <aside id="auth-menu">
	    	<ul id="contextual-links">
		    	@section('contextual-links')
		    	@if (isset($contextual))
		    		@foreach($contextual as $context)
		    			<li>{{ $context }}</li>
		    		@endforeach
		    	@endif

				@endsection
				@yield('contextual-links')
			</ul>
			<ul id="user-links">
		    	@section('user-links')
			    	<li>{{ HTML::link(URL::to_action('user@profile'), 'Profile') }}</li>
			        <li>{{ HTML::link(URL::to_action('user@logout'), 'Log Out') }}</li>
				@endsection
				@yield('user-links')
			</ul>
	    </aside>
    @endif
    <header id="header">
    	<div id="global">
	    	<div class="container">
	    		<a id="logo" href="http://www.uoguelph.ca/" tip=""><strong>University of Guelph</strong></a>
		    	<h1><a href="/">{{ $title }}</a></h1>
		    	
		    	<form id="searchbox_011117603928904778939:tp3ks5ha2dw" action="http://www.uoguelph.ca/search/" name="searchform">
			        <input type="hidden" name="cx" value="011117603928904778939:tp3ks5ha2dw">
			        <input type="hidden" name="cof" value="FORID:11">
			        <input name="q" type="text" size="20" maxlength="256" class="search1" id="searchtext">
			        <label for="searchtext">
			        <input type="image" src="http://www.uoguelph.ca/img/search.gif" alt="search web" title="search web" id="searchbutton">
			        </label>
			    </form>				
			    <div id="searchtype"><strong>search:</strong>
					<span id="webSearchButton" class="selectedSearch"><span>Web</span></span>
					<span id="dirSearchButton" class="altSearch"><a href="http://www.uoguelph.ca/directory"><span>Directory</span></a></span>
					<span id="libSearchButton" class="altSearch"><a href="http://www.lib.uoguelph.ca"><span>Library</span></label></a></span>      
		       	</div>
			    
		    	<nav id="globalnav">
			    	<ul id="primary-links">
				    	@section('primary-links')
					    	<li><a href="http://www.uoguelph.ca/academics/" id="menu-academics" tip=""><span>Academics</span></a></li>
					        <li><a href="http://www.uoguelph.ca/campus/" id="menu-campus" tip=""><span>Campus</span></a></li>
					        <li><a href="http://www.uoguelph.ca/international/info/" id="menu-library" tip=""><span>International</span></a></li>
					        <li><a href="http://www.uoguelph.ca/research/" id="menu-research" tip=""><span>Research</span></a></li>
					        <li><a href="http://www.uoguelph.ca/services/" id="menu-services" tip=""><span>Services</span></a></li>
						@endsection
						@yield('primary-links')
					</ul>
				</nav>
			</div>
		</div>
		<nav id="local">
    		<div class="container">
    			<ul id="secondary-links">
			    	@section('secondary-links')
					    <li><a href="/">Home</a></li>
					    <li><a href="/datasets">Data Sets</a></li>
					    <li><a href="/search">Search</a></li>
					@endsection
					@yield('secondary-links')
				</ul>
    		</div>
    	</nav>
    </header>
    
    <body>    
    	<article id="main">
	    	<div class="container">
	    	<h2>{{ $subtitle }}</h2>
	    	@if(Session::has('status'))	    		
				<div id="status" class=" {{ Session::get('status'); }}">
					<ul class="message-list">
						@if (is_array(Session::get('status-msg')))
							@foreach (Session::get('status-msg') as $m)
								<li class="msg">{{ $m }}</li>
							@endforeach
						@else 
							<li class="msg">{{ Session::get('status-msg'); }}</li>
						@endif
					</ul>
				</div>
			@endif
	      	{{ $content }}
	      	</div>
      	</article>
      	
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
		
		<div id="footer">
			<div class="container">
				<p><a href="http://www.uoguelph.ca/web/terms/">© 2013 University of Guelph</a></p>
			</div>
		</div>
    </body>
</html>