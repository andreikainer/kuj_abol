<!DOCTYPE html>
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
		<link rel="icon" type="image/png" href="{{ asset('/img/logo_tab.png') }}">

    <!-- Slick carousel -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.5.0/slick.css"/>
    <!-- Slick-theme.css for default styling -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.5.0/slick-theme.css"/>
    <!-- Main styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">


	<!-- Fonts -->
	    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Montserrat+Alternates' rel='stylesheet' type='text/css'>
    <!-- Font awesome -->
        <link rel="stylesheet" href="{{ asset('/css/font-awesome-4.2.0/css/font-awesome.min.css') }}">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!--[if lt IE 9]>
		    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
    </head>



<body>
    <div class="container-fluid">



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
            <nav class="navbar navbar-default navbar-fixed-top">
	            <div class="container-fluid">
               	    <div class="navbar-header">

                 	<!-- hamburger_btn -->
           				<button type="button" class="navbar-toggle collapsed fontawesome" data-toggle="collapse" data-target="#main_nav">
           					<i class="fa fa-bars fa-2x"></i>
           				</button>

                 	<!-- logo -->
           				<a href="#" class="navbar-brand logo">
           				    <img src="{{ asset('/img/logo.svg') }}" alt="logo">
           				</a>

               		</div>

               		<div class="collapse navbar-collapse" id="main_nav">
                 		<ul class="nav navbar-nav">
                   			<li class="dropdown">
                     			<a class="dropdown-toggle" data-toggle="dropdown" href="#">HOW IT WORKS <span class="caret"></span></a>
                     			<ul class="dropdown-menu">
                       			    <li><a href="#">Page 1-1</a></li>
                       				<li><a href="#">Page 1-2</a></li>
                       				<li><a href="#">Page 1-3</a></li>
                     			</ul>
                  			</li>
                   			<li><a href="#">CREATE PROJECT</a></li>
                   			<li><a href="#">CONTRIBUTE</a></li>
                 		</ul>

                 		<ul class="nav navbar-nav navbar-right">
                 			<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Log in </a></li>
                 		    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                 		</ul>
               		</div>
             	</div>
           	</nav>

        </header> <!-- header ends -->


<!--================== Main Content =================================================-->
        <div class="container-fluid" role="main">

	        @yield('content')

        </div> <!-- main content ends -->







<!--================== Footer =================================================-->
	    <footer></footer>
    </div> <!-- container ends -->






<!--================== Scripts =================================================-->
<!-- jQuery -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script>
    	window.jQuery || document.write('<script src="{{ asset('/js/jquery-1.11.1.min.js') }}"><\/script>')
    </script>

<!-- Slick carousel -->
	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.5.0/slick.min.js"></script>

	<script src="{{ asset('/js/modernizr.js') }}"></script>

<!-- Opera Mini backup -->
	<script type="text/javascript">
		var isOperaMini = (navigator.userAgent.indexOf('Opera Mini') > -1);
		if (isOperaMini){
			jQuery("#operamini").show();
		}
	</script>

<!-- ABOL js -->
	<script src="{{ asset('/js/main.js') }}"></script>
	<script>@yield('additional_js')</script> <!-- here you may put any additional js that is not necessary on the other pages -->

</body>
</html>
