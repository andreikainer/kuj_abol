<!DOCTYPE html >
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en" class="no-js"> <!--<![endif]-->
	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<meta name="descripion" content="????"> <!-- recomended 160 chrs, will be shown on search engine result pages -->
		<!-- <meta name="robots" content="noindex, nofollow" /> -->
		<meta charset="utf-8" />

		<title>Kinder-und Jugenfönderungen</title>
		<link rel="icon" type="image/png" href="assets/img/logo_tab.png">

	<!-- Font awesome -->
        <link rel="stylesheet" href="assets/font-awesome-4.2.0/css/font-awesome.min.css">
    <!-- Slick carousel -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.5.0/slick.css"/>
    <!-- Slick-theme.css for default styling -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.5.0/slick-theme.css"/>
        <link rel="stylesheet" type="text/css"href="assets/css/styles.css">

	<!-- Fonts -->
	    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Montserrat+Alternates' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
<!--================== Backups =================================================-->
<!--[if lte IE 9]>
	<div class="message" id="oldie">
		<p>Sorry, but this website does not support IE9 or lower. Please <a href="http://windows.microsoft.com/ie">upgrade your IE</a> or <a href="http://www.browsehappy.com">switch to another browser</a>.</p>
	</div>
<![endif]-->

<!-- Opera Mini backup -->
	<div style="display:none;" class="message" id="operamini">
		<p>Sorry, but this website does not support Opera Mini. Please switch to another browser such as Opera for Android, Chrome, Firefox, or Safari.</p>
	</div>

<!-- no JS backup -->
	<noscript>
		<div class="message" id="nojs">
			<p>Sorry, but you need JavaScript to enjoy full experience from this page. Please, enable JavaScript in your browser or switch to a JavaScript device.</p>
		</div>
	</noscript>



<!--================== Header =================================================-->
    <header>
	    <nav class="navbar navbar-default">
		    <div class="container-fluid">
			    <div class="navbar-header">
				    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					    <span class="sr-only">Toggle Navigation</span>
					    <span class="icon-bar"></span>
					    <span class="icon-bar"></span>
					    <span class="icon-bar"></span>
				    </button>
				    <a class="navbar-brand" href="#">Laravel</a>
			    </div>

			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				    <ul class="nav navbar-nav">
					    <li><a href="{{ url('/') }}">Home</a></li>
				    </ul>

				    <ul class="nav navbar-nav navbar-right">
					    @if (Auth::guest())
						    <li><a href="{{ url('/auth/login') }}">Login</a></li>
						    <li><a href="{{ url('/auth/register') }}">Register</a></li>
					    @else
						    <li class="dropdown">
							    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							    <ul class="dropdown-menu" role="menu">
								    <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							    </ul>
						    </li>
					    @endif
				    </ul>
			    </div>
		    </div>
	    </nav>

    </header> <!-- header ends -->


<!--================== Main Content =================================================-->
    <main role="main">
	@yield('content')
    </main>


<!--================== Footer =================================================-->
	<footer></footer>



	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Slick carousel -->
	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.5.0/slick.min.js"></script>
	<script>
		window.jQuery || document.write('<script src="../????path/assets/js/jquery-1.11.1.min.js"><\/script>')
	</script>
	<script src="assets/js/modernizr.js"></script>
	<script type="text/javascript">
		//Opera Mini backup
		var isOperaMini = (navigator.userAgent.indexOf('Opera Mini') > -1);
		if (isOperaMini){
			jQuery("#operamini").show();
		}
	</script>
	<script src="assets/js/script.js"></script>
</body>

</html>
	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
