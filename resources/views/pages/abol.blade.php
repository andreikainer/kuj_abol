<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en" class="no-js"> <!--<![endif]-->

	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<meta name="descripion" content="????"> <!-- recomended 160 chrs, will be shown on search engine result pages -->

		<meta charset="utf-8" />
		<meta name="csrf-token" content="{{ csrf_token() }}" />

		<title>Abol</title>
		<link rel="icon" type="image/png" href="{{ asset('/img/abol.jpg') }}">

    <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- Main styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">


	<!-- Fonts -->
	    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,700&subset=latin-ext' rel='stylesheet' type='text/css'>

    <!-- Font awesome -->
        <link rel="stylesheet" href="{{ asset('/css/font-awesome-4.2.0/css/font-awesome.min.css') }}">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!--[if lt IE 9]>
		    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
    </head>



<body class="tpad-zero">


<!--================== Backups =================================================-->

<!--[if lte IE 9]>
	    <div class="message" id="oldie">
	    	<p class="text-center"><i class="fa fa-exclamation-circle"></i> Sorry, but this website does not support IE9 or lower. Please <a href="http://windows.microsoft.com/ie">upgrade your IE</a> or <a href="http://www.browsehappy.com">switch to another browser</a>.</p>
	    </div>
<![endif]-->

<!-- Opera Mini backup -->
	    <div style="display:none;" class="message" id="operamini">
	    	<p class="text-center"><i class="fa fa-exclamation-circle"></i> Sorry, but this website does not support Opera Mini. Please switch to another browser such as Opera for Android, Chrome, Firefox, or Safari.</p>
	    </div>

<!-- no JS backup -->
	    <noscript>
	    	<div class="message" id="nojs">
	    		<p class="text-center"><i class="fa fa-exclamation-circle"></i> Sorry, but you need JavaScript to enjoy full experience from this page. Please, enable JavaScript in your browser or switch to a JavaScript device.</p>
	    	</div>
	    </noscript>





<!--================== Header =================================================-->
        <div class="container-fluid" id="abol">

            <div class="row">

                <div class="col-xs-12 mt-2em">
                    <div class="text-center">
                        <a href="#" data-scroll class="main-link">WORKS</a>
                        <a href="{{ action('PagesController@abol') }}">
                            <img src="{{ asset('/img/abol.svg') }}" alt="logo" class="abol-logo">
                        </a>
                        <a href="#contacts" data-scroll class="main-link">CONTACTS</a>
                    </div>
                </div>

            </div>

 <!--================== Main Content =================================================-->
            <div class="row mt-5em" id="contacts">

                <div class="col-xs-12 col-sm-4 mt-3em">
                    <div class="text-center">
                        <a href="http://andreikainer.com">
                            <img src="{{ asset('/img/abol-member.jpg') }}" alt="logo" class="img-circle abol-team">
                        </a>
                        <h2>Andrei Kainer</h2>
                        <a href="http://andreikainer.com" class="sec-link"><i class="fa fa-hand-o-right"></i>Meet me on Web</a>
                        <a href="https://github.com/andreikainer" class="sec-link"><i class="fa fa-github"></i>Check my works on GitHub</a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4 mt-3em">
                    <div class="text-center">
                        <a href="https://github.com/bradmilburn">
                            <img src="{{ asset('/img/abol-member.jpg') }}" alt="logo" class="img-circle abol-team">
                        </a>
                        <h2>Brad Milburn</h2>
                        <a href="http://github.com/bradmilburn" class="sec-link"><i class="fa fa-hand-o-right"></i>Meet me on Web</a>
                        <a href="https://github.com/bradmilburn" class="sec-link"><i class="fa fa-github"></i>Check my works on GitHub</a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4 mt-3em">
                    <div class="text-center">
                        <a href="http://olgasmirnova.co.nz">
                            <img src="{{ asset('/img/abol-member.jpg') }}" alt="logo" class="img-circle abol-team">
                        </a>
                        <h2>Olga Smirnova</h2>
                        <a href="http://olgasmirnova.co.nz" class="sec-link"><i class="fa fa-hand-o-right"></i>Meet me on Web</a>
                        <a href="https://github.com/Olga--Smirnova" class="sec-link"><i class="fa fa-github"></i>Check my works on GitHub</a>
                    </div>
                </div>

            </div>

            <div class="row">
                <p class="text-center mt-3em copywrite">&copy;copyright {{ Carbon\Carbon::now()->year }}</p>
            </div>
        </div><!-- container ends -->






<!--================== Scripts =================================================-->
<!-- jQuery -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script>
    	window.jQuery || document.write('<script src="{{ asset('/js/jquery-1.11.1.min.js') }}"><\/script>')
    </script>

<!-- Bootstrap js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


	<script src="{{ asset('/js/modernizr.js') }}"></script>

<!-- Smooth scroll -->
    <script src="{{ asset('/js/smooth-scroll.js') }}"></script>
    <script src="{{ asset('/js/abol.js') }}"></script>

</body>
</html>
