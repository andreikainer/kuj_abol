<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en" class="no-js"> <!--<![endif]-->

	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<meta name="descripion" content="Crowdfunding für den guten Zweck. Helfen Sie einer Familie aus Österreich und ermöglichen Sie somit Erleichterung im Alltag">
		<meta name="robots" content="noindex, nofollow" />
		<meta charset="utf-8" />
		<meta name="csrf-token" content="{{ csrf_token() }}" />

		<title>Initiative Kinder-und Jugenförderungen</title>
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
	    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,700&subset=latin-ext' rel='stylesheet' type='text/css'>
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
        <header class="clearfix">

            <nav class="navbar navbar-default navbar-fixed-top white-bg"  data-scroll-header>
                <div class="container-fluid">
	                <div class="row">
               	        <div class="col-md-2 col-lg-2 navbar-header">

                 	    <!-- hamburger_btn for mobile -->
           			    	<button type="button" class="navbar-toggle collapsed button-circle mobile-circle-button" data-toggle="collapse" data-target="#main_nav">
           			    		<i class="fa fa-bars"></i>
           			    	</button>

                        <!-- language_btn for mobile -->
                        @if(LaravelLocalization::getCurrentLocale() == 'de')
                            <a rel="alternate" hreflang="en" href="{{LaravelLocalization::getLocalizedURL("en") }}" class="navbar-toggle visible-xs button-circle mobile-circle-button flag gb language-toggle"></a>
                        @else(LaravelLocalization::getCurrentLocale() == 'en')
                            <a rel="alternate" hreflang="de" href="{{LaravelLocalization::getLocalizedURL("de") }}" class="navbar-toggle visible-xs button-circle mobile-circle-button flag at language-toggle"></a>
                        @endif

                        <!-- help_btn -->
                            <a href="{{ action('ContactFormController@getContactForm') }}" class="navbar-toggle visible-xs button-circle mobile-circle-button question">
                                    <i class="fa fa-question"></i>
                            </a>

           			    <!-- search_btn for mobile -->
                            <button type="button" class="navbar-toggle visible-xs button-circle mobile-circle-button magnif magnifier" data-target="#search_module">
                                <i class="fa fa-search"></i>
                            </button>

                 	    <!-- logo -->
           			    	<a href="{{ action('ProjectsController@index') }}" class="navbar-brand logo">
           			    	    <img src="{{ asset('/img/logo.svg') }}" alt="logo">
           			    	</a>

               		    </div>


               		    <div class="col-sm-4 col-sm-push-5 col-md-3 col-md-push-7 col-lg-3 col-lg-push-8 hidden-xs circles">
                            <div>
                                <div class="alignme-center clearfix">

                                <!-- language_btn -->
                                <a rel="alternate" hreflang="de" href="{{LaravelLocalization::getLocalizedURL("de") }}" class="navbar-toggle hidden-xs hvr-push button-circle flag at"></a>
                                <a rel="alternate" hreflang="en" href="{{LaravelLocalization::getLocalizedURL("en") }}" class="navbar-toggle hidden-xs hvr-push button-circle flag gb"></a>

                                <!-- help_btn -->
                                <a href="{{ action('ContactFormController@getContactForm') }}" class="navbar-toggle button-circle hvr-push question">
                                        <i class="fa fa-question"></i>
                                </a>

                                <!-- search_btn -->
                                    <button class="navbar-toggle button-circle hvr-push magnif magnifier" data-target="#search_module">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>

                                <div>

                                <!-- if there is a logged in user in the session, change the buttons to LOGOUT and USERNAME -->
                                    @if(Session::has('username'))
                                        <a href="{{ action('Auth\AuthController@getLogout') }}" class="btn btn-xs button-main button-user" id="logout">{{ trans('app.logout') }}</a>
                                        <a href="{{ action('UserpanelController@show', Session::get('username')) }}" class="btn btn-xs button-main button-user" id="username-btn">{{ ucfirst(Session::get('username')) }}</a>

                                    @else
                                <!-- if there is no logged in user in the session, change the buttons to LOGIN and REGISTER -->
                                        <a href="{{ action('Auth\AuthController@getLogin') }}" class="btn btn-xs button-main button-user login">{{ trans('app.login') }}</a>
                                        <a href="{{ action('Auth\AuthController@getRegister') }}" class="btn btn-xs button-main button-user">{{ trans('app.register') }}</a>
                                    @endif

                                </div>

                            </div>
                        </div>

               		    <div class="col-sm-7 col-md-2 col-md-pull-2 col-lg-2 col-lg-pull-1 collapse navbar-collapse" id="main_nav" role="navigation">
                 	       <hr class="visible-sm">
                 	       <ul class="nav navbar-nav">

                                <!-- if there is a logged in user in the session, change the buttons to LOGOUT and USERNAME -->
                                    @if(Session::has('username'))
                                        <li class="hidden-sm hidden-md hidden-lg"><a href="{{ action('Auth\AuthController@getLogout') }}"><i class="fa fa-sign-in"></i>{{ trans('app.logout') }}</a></li>
                                        <li class="hidden-sm hidden-md hidden-lg"><a href="{{ action('UserpanelController@show', Session::get('username')) }}"><i class="fa fa-user"></i>{{ ucfirst(Session::get('username')) }}</a></li>

                                    @else
                                <!-- if there is no logged in user in the session, change the buttons to LOGIN and REGISTER -->
                                        <li class="hidden-sm hidden-md hidden-lg"><a href="{{ action('Auth\AuthController@getLogin') }}"><i class="fa fa-sign-in"></i>  {{ trans('app.login') }}</a></li>
                                        <li class="hidden-sm hidden-md hidden-lg"><a href="{{ action('Auth\AuthController@getRegister') }}"><i class="fa fa-user"></i>  {{ trans('app.register') }}</a></li>
                                    @endif

                   	        	<li class="dropdown">
                            		<a class="dropdown-toggle" data-toggle="dropdown">{{ trans('app.how-it-works') }}<span class="caret"></span></a>
                            		<ul class="dropdown-menu">
                            		    <li><a href="{{ action('PagesController@howItWorks') }}">{{ trans('app.overview') }}</a></li>
                            		    <li><a href="{{ action('PagesController@howItWorks') }}/#faq">FAQ</a></li>
                            		    <li role="presentation" class="divider"></li>
                            		    <li><a href="{{ action('PagesController@sponsors') }}">{{ trans('app.our-sponsors') }}</a></li>
                            		    <li><a href="{{ action('PagesController@howItWorks') }}/#our_goal">{{ trans('app.about-us') }}</a></li>
                            			<li><a href="{{ action('PagesController@howItWorks') }}/#our_team">{{ trans('app.our-team') }}</a></li>
                            		</ul>
                  	        	</li>
                   	        	<li><a href="{{ action('ProjectsController@createProject') }}">{{ trans('app.create-project') }}</a></li>
                   	        	<li><a href="{{ action('ProjectsController@showMoreProjects') }}">{{ trans('app.contribute') }}</a></li>
                 	        </ul>
                        </div>

               		</div> <!-- end of row -->
             	</div> <!-- end of container -->
           	</nav>

        </header> <!-- header ends -->




<!--**************************-->
    <!-- SEARCH MODULE -->
<!--**************************-->
       @include('modules.search-module')



<!--================== Main Content =================================================-->

                @if (Session::has('flash_message'))
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                                <div class="alert flash-message text-center fade in">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times;</button>
                                    {{ Session::get('flash_message') }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
	            @yield('content')



<!--================== Footer =================================================-->
	        <footer class="row clearfix">

            <!-- Social Media Buttons -->
	            <div class="col-xs-12 col-sm-4 col-md-4 col-md-push-4 col-lg-4 block socialmedia">
	                <div class="clearfix">
	                <!-- facebook_btn -->
                        <a href="https://www.facebook.com/kinderfoerderungen" class="clearfix alignme-center navbar-toggle button-circle hvr-push" id="facebook">
                                <i class="fa fa-facebook"></i>
                        </a>
                    <!-- twitter_btn -->
                        <a href="https://twitter.com/KuJfoerderungen" class="clearfix alignme-center navbar-toggle button-circle hvr-push" id="twitter">
                                <i class="fa fa-twitter"></i>
                        </a>
                    <!-- youtube_btn -->
                        <a href="https://www.youtube.com/channel/UC4FjChxkG7VmTYNQGbQbTyw" class="clearfix alignme-center navbar-toggle button-circle hvr-push" id="youtube">
                                <i class="fa fa-youtube-play"></i>
                        </a>
                    <!-- googleplus_btn -->
                        <a href="https://plus.google.com/114913587570028591368/videos" class="clearfix alignme-center navbar-toggle button-circle hvr-push" id="googleplus">
                                <i class="fa fa-google-plus"></i>
                        </a>
                    </div>

                    <div>
                        <form class="form" action="{{ action('ContactFormController@postNewsletter') }}" method="post" id="newsletter-signup">
                            <div class="form-group">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <label for="email" class="hidden">Newsletter</label>
                                <input type="email" class="form-control" placeholder="{{ trans('app.newsletter') }}" name="email">
                            </div>
                            <button type="submit" class="btn btn-default button-sec" id="newsletter">{{ trans('app.sign-up') }}</button>
                        </form>
                        <p class="mt-2em">{{ trans('app.legal-stuff') }}</p>
                    </div>

                </div>


            <!-- Site Map -->
	            <div class="col-xs-11 col-xs-push-1 col-sm-3 col-md-3 col-md-pull-12 col-lg-3">
	                <div class="footer-text-content">
	                    <h5>{{ trans('app.site-map') }}</h5>
	                    <a href="{{ trans('routes.how-it-works') }}">{{ trans('app.how-it-works') }}</a>
	                    <a href="{{ action('ProjectsController@createProject') }}">{{ trans('app.create-project') }}</a>
	                    <a href="{{ action('ProjectsController@showMoreProjects') }}">{{ trans('app.contribute') }}</a>

	                    <br>

	                    {{--<a href="#">Blog</a>--}}
                        <a href="{{ trans('routes.sponsors') }}">{{ trans('app.our-sponsors') }}</a>

                        <br>

                        <a href="{{ asset('documents/terms-and-conditions.pdf') }}" target="_blank">{{ trans('app.terms-and-conditions') }}</a>
                        <a href="{{ action('PagesController@imprint') }}">{{ trans('app.imprint') }}</a>
	                </div>
	            </div>


            <!-- Contacts -->
                <div class="col-xs-10 col-xs-push-1 col-sm-4 col-md-3 col-md-offset-1 col-lg-3">
                    <div class="footer-text-content">
                        <h5>{{ trans('app.contacts') }}</h5>

                        <p><i class="fa fa-home form-inline"></i> <a href="https://www.google.co.nz/maps/place/M%C3%BChlhofstra%C3%9Fe+3,+2524+Teesdorf,+Austria/@47.9513791,16.2887902,14z/data=!4m2!3m1!1s0x476db403c8f03ef3:0x19b6531c4b2dc01c">Mühlhofstraße 3/2/12<br>
                                                                        2524 Teesdorf Austria
                                                            </a></p>
                        <p><i class="fa fa-envelope"></i><a href="{{ action('ContactFormController@getContactForm') }}">wilhelmine.bauer@sponsoring-agentur.at</a></p>
                        <p><i class="fa fa-phone"></i><a href="tel:+4366488299511">+43 664 8829 9511</a></p>

                        <br>

                        <p class="no-bottom-margin">&copy;copyright {{ Carbon\Carbon::now()->year }}</p>
                        <p>{{ trans('app.website-made-by') }} <a href="{{ action('PagesController@abol') }}">ABOL Web</a></p>
                	</div>
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

<!-- Smooth scroll -->
    <script src="{{ asset('/js/smooth-scroll.js') }}"></script>

<!-- CountUp -->
    <script src="{{ asset('/js/countUp.min.js') }}"></script>

<!-- MooTools -->
<script src="https://ajax.googleapis.com/ajax/libs/mootools/1.5.1/mootools-yui-compressed.js"></script>

<!-- ABOL js -->
	<script src="{{ asset('/js/main.js') }}"></script>
	@yield('additional_js') <!-- here you may put any additional js that is not necessary on the other pages -->

</body>
</html>
