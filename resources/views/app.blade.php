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
    <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- Main styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">


	<!-- Fonts -->
	    <link href='http://fonts.googleapis.com/css?family=Lato:100,300&subset=latin-ext' rel='stylesheet' type='text/css'>
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
        <header>
            <nav class="navbar navbar-default navbar-fixed-top white-bg">
                <div class="container-fluid">
	                <div class="row">
               	        <div class="col-md-2 col-lg-2 navbar-header">

                 	    <!-- hamburger_btn -->
           			    	<button type="button" class="navbar-toggle collapsed button-circle humburger" data-toggle="collapse" data-target="#main_nav">
           			    		<i class="fa fa-bars"></i>
           			    	</button>

                 	    <!-- logo -->
           			    	<a href="#" class="navbar-brand logo">
           			    	    <img src="{{ asset('/img/logo.svg') }}" alt="logo">
           			    	</a>

               		    </div>


               		    <div class="col-sm-4 col-sm-push-5 col-md-3 col-md-push-7 col-lg-3 col-lg-push-8 hidden-xs circles">
                            <div>
                                <div class="alignme-center clearfix">
                                <!-- language_btn -->
                                    <button type="button" class="navbar-toggle button-circle hvr-push flag gb" id="language-toggle">
                                    </button>

                                <!-- ask question_btn -->
                                    <button type="button" class="navbar-toggle collapsed button-circle hvr-push" id="question" data-toggle="collapse" data-target="#help_modal">
                                        <i class="fa fa-question"></i>
                                    </button>

                                <!-- search_btn -->
                                    <button type="button" role="search" class="navbar-toggle collapsed button-circle hvr-push" id="magnifier" data-toggle="collapse" data-target="#search_modal">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>

                                <div class="alignme-center">
                                    <button type="button" class="btn btn-xs button-main button-user">Einloggen</button>
                                    <button type="button" class="btn btn-xs button-main button-user">Regestrieren</button>
                                </div>

                            </div>
                        </div>

               		    <div class="col-sm-7 col-md-2 col-md-pull-2 col-lg-2 col-lg-pull-1 collapse navbar-collapse" id="main_nav" role="navigation">
                 	       <hr class="visible-sm">
                 	       <ul class="nav navbar-nav">
                   	        	<li class="hidden-sm hidden-md hidden-lg"><a href="#"><i class="fa fa-sign-in"></i>  Einloggen</a></li>
                                <li class="hidden-sm hidden-md hidden-lg"><a href="#"><i class="fa fa-user"></i>  Regestrieren</a></li>
                                {{--<li class="hidden-sm hidden-md hidden-lg"><a href="#"><i class="fa fa-sign-in"></i>  Einloggen</a></li>--}}
                                {{--<li class="hidden-sm hidden-md hidden-lg"><a href="#"><i class="fa fa-user"></i>  Regestrieren</a></li>--}}

                   	        	<li class="dropdown">
                            		<a class="dropdown-toggle" data-toggle="dropdown" href="#">So funktionert’s <span class="caret"></span></a>
                            		<ul class="dropdown-menu">
                            		    <li><a href="#">Tips For Success</a></li>
                            		    <li><a href="#">FAQ</a></li>
                            		    <li role="presentation" class="divider"></li>
                            		    <li><a href="#">Our Sponsors</a></li>
                            		    <li><a href="#">Our Mission</a></li>
                            			<li><a href="#">Our Team</a></li>
                            		</ul>
                  	        	</li>
                   	        	<li><a href="#">Ansuchen einreichen</a></li>
                   	        	<li><a href="#">Fördern</a></li>
                 	        </ul>
                        </div>

               		</div> <!-- end of row -->
             	</div> <!-- end of container -->
           	</nav>

        </header> <!-- header ends -->


<!--================== Main Content =================================================-->
        <div class="container-fluid">
            <div class="row" role="main">

	            @yield('content')

            </div> <!-- main content ends -->






<!--================== Footer =================================================-->
	        <footer role="complementary" class="clearfix row">

	            <div class="col-md4 col-lg-4">

	            </div>

            <!-- Social Media Buttons -->
	            <div class="col-xs-12 col-sm-4 col-md4 col-lg-4 socialmedia">
                <!-- youtube_btn -->
                    <a href="https://www.youtube.com/channel/UC4FjChxkG7VmTYNQGbQbTyw">
                        <button type="button" class="navbar-toggle collapsed button-circle hvr-push" id="youtube">
                            <i class="fa fa-youtube"></i>
                        </button>
                    </a>
                <!-- googleplus_btn -->
                <a href="https://plus.google.com/114913587570028591368/videos">
                    <button type="button" class="navbar-toggle collapsed button-circle hvr-push" id="googleplus">
                        <i class="fa fa-google-plus"></i>
                    </button>
                </a>
                <!-- twitter_btn -->
                <a href="https://twitter.com/KuJfoerderungen">
                    <button type="button" class="navbar-toggle collapsed button-circle hvr-push" id="twitter">
                        <i class="fa fa-twitter"></i>
                    </button>
                </a>
                <!-- facebook_btn -->
                <a href="https://www.facebook.com/kinderfoerderungen">
                    <button type="button" class="navbar-toggle collapsed button-circle hvr-push" id="facebook">
                        <i class="fa fa-facebook"></i>
                    </button>
                </a>
                </div>

                <div class="col-md4 col-lg-4">

                </div>



	        </footer> <!-- footer ends -->
        </div> <!-- container ends -->






<!--================== Scripts =================================================-->
<!-- jQuery -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script>
    	window.jQuery || document.write('<script src="{{ asset('/js/jquery-1.11.1.min.js') }}"><\/script>')
    </script>

<!-- Bootstrap js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<!-- Slick carousel -->
	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.5.0/slick.min.js"></script>

	<script src="{{ asset('/js/modernizr.js') }}"></script>

<!-- ABOL js -->
	<script src="{{ asset('/js/main.js') }}"></script>
	<script>@yield('additional_js')</script> <!-- here you may put any additional js that is not necessary on the other pages -->

</body>
</html>
