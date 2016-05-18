<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title> SmartAdmin </title>
		<meta name="description" content="">
		<meta name="author" content="">
			
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/bootstrap.min.css')}}">
		<link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/font-awesome.min.css')}}">

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/smartadmin-production-plugins.min.css')}}">
		<link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/smartadmin-production.min.css')}}">
		<link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/smartadmin-skins.min.css')}}">

		<!-- SmartAdmin RTL Support  -->
		<link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/smartadmin-rtl.min.css')}}">

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.

		Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
		<link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/demo.min.css')}}">

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

		<!-- Specifying a Webpage Icon for Web Clip 
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="img/splash/touch-icon-ipad-retina.png">
		
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		
		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="img/splash/iphone.png" media="screen and (max-device-width: 320px)">

		<style>
		ul {
			list-style: none;
		}
		li.itemtag {
			padding: 2px;
			margin: 4px;
			display: inline-block;
		}

		</style>
	</head>
	
	<!--

	TABLE OF CONTENTS.
	
	Use search to find needed section.
	
	===================================================================
	
	|  01. #CSS Links                |  all CSS links and file paths  |
	|  02. #FAVICONS                 |  Favicon links and file paths  |
	|  03. #GOOGLE FONT              |  Google font link              |
	|  04. #APP SCREEN / ICONS       |  app icons, screen backdrops   |
	|  05. #BODY                     |  body tag                      |
	|  06. #HEADER                   |  header tag                    |
	|  07. #PROJECTS                 |  project lists                 |
	|  08. #TOGGLE LAYOUT BUTTONS    |  layout buttons and actions    |
	|  09. #MOBILE                   |  mobile view dropdown          |
	|  10. #SEARCH                   |  search field                  |
	|  11. #NAVIGATION               |  left panel & navigation       |
	|  12. #RIGHT PANEL              |  right panel userlist          |
	|  13. #MAIN PANEL               |  main panel                    |
	|  14. #MAIN CONTENT             |  content holder                |
	|  15. #PAGE FOOTER              |  page footer                   |
	|  16. #SHORTCUT AREA            |  dropdown shortcuts area       |
	|  17. #PLUGINS                  |  all scripts and plugins       |
	
	===================================================================
	
	-->
	
	<!-- #BODY -->
	<!-- Possible Classes

		* 'smart-style-{SKIN#}'
		* 'smart-rtl'         - Switch theme mode to RTL
		* 'menu-on-top'       - Switch to top navigation (no DOM change required)
		* 'no-menu'			  - Hides the menu completely
		* 'hidden-menu'       - Hides the main menu but still accessable by hovering over left edge
		* 'fixed-header'      - Fixes the header
		* 'fixed-navigation'  - Fixes the main menu
		* 'fixed-ribbon'      - Fixes breadcrumb
		* 'fixed-page-footer' - Fixes footer
		* 'container'         - boxed layout mode (non-responsive: will not work with fixed-navigation & fixed-ribbon)
	-->
	<body class="">

		<!-- HEADER -->
		<header id="header">
			<div id="logo-group">

				<!-- PLACE YOUR LOGO HERE -->
				<span id="logo">  LearningMachine</span>
				<!-- END LOGO PLACEHOLDER -->

				<!-- END AJAX-DROPDOWN -->
			</div>

		</header>
		<!-- END HEADER -->

		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<aside id="left-panel">

			<!-- User info -->

			<!-- end user info -->

			<!-- NAVIGATION : This navigation is also responsive-->
			<nav>
				<!-- 
				NOTE: Notice the gaps after each icon usage <i></i>..
				Please note that these links work a bit different than
				traditional href="" links. See documentation for details.
				-->

				<ul>

					<li class="active">
						<a href="#" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
							
					</li>
					<li class="top-menu-invisible">
						<a href="#"><i class="fa fa-lg fa-fw fa-cube txt-color-blue"></i> <span class="menu-item-parent">Categories</span></a>
						<ul>
							<li>
								<a href="{{ route('category.index') }}">List All</a>
							</li>
							<li>
								<a href="{{ route('category.create') }}">Create New</a>
							</li>
						</ul>
					</li>

					<li class="top-menu-invisible">
						<a href="{{ route('item.index') }}"><i class="fa fa-lg fa-fw fa-cube txt-color-blue"></i> <span class="menu-item-parent">Items</span></a>
						
					</li>
					<li class="top-menu-invisible">
						<a href="{{ route('tag.index') }}"><i class="fa fa-lg fa-fw fa-cube txt-color-blue"></i> <span class="menu-item-parent">Tags</span></a>
						
					</li>
					<li class="top-menu-invisible">
						<a href="{{ route('sequence.index') }}"><i class="fa fa-lg fa-fw fa-cube txt-color-blue"></i> <span class="menu-item-parent">Sequences</span></a>
						
					</li>
					<li>
						<a href="{{ url('/logout') }}"><i class="fa fa-lg fa-fw fa-inbox"></i> <span class="menu-item-parent">Logout</span> <span class="badge pull-right inbox-badge margin-right-13">14</span></a>
					</li>

				</ul>
			</nav>


		</aside>
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<span class="ribbon-button-alignment"> 
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
						<i class="fa fa-refresh"></i>
					</span> 
				</span>

				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li>Home</li><li>Dashboard</li>
				</ol>
				<!-- end breadcrumb -->

				<!-- You can also add more buttons to the
				ribbon for further usability

				Example below:

				<span class="ribbon-button-alignment pull-right">
				<span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
				<span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
				<span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
				</span> -->

			</div>
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">

			<br>
			 @if ($errors->has())
	        <div class="alert alert-danger fade in">
	          @foreach ($errors->all() as $error)
	            {{$error}}</br>
	          @endforeach
	        </div>
	      @endif
			@if(Session::has('danger'))
				<div class="alert alert-danger fade in">{{Session::get('danger')}}</div>
			@endif			
			@if(Session::has('warning'))
				<div class="alert alert-warning fade in">{{Session::get('warning')}}</div>
			@endif
			@if(Session::has('success'))
				<div class="alert alert-success fade in">{{Session::get('success')}}</div>
			@endif

				@yield('content')
			</div>
			<!-- END MAIN CONTENT -->

		</div>
		<!-- END MAIN PANEL -->

		<!-- PAGE FOOTER -->
		<div class="page-footer">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<span class="txt-color-white">SmartAdmin 1.8.2 <span class="hidden-xs"> - Web Application Framework</span> © 2014-2015</span>
				</div>

			</div>
		</div>
		<!-- END PAGE FOOTER -->

		<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
		Note: These tiles are completely responsive,
		you can add as many as you like
		-->
		<div id="shortcut">
			<ul>
				<li>
					<a href="inbox.html" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-envelope fa-4x"></i> <span>Mail <span class="label pull-right bg-color-darken">14</span></span> </span> </a>
				</li>
				<li>
					<a href="calendar.html" class="jarvismetro-tile big-cubes bg-color-orangeDark"> <span class="iconbox"> <i class="fa fa-calendar fa-4x"></i> <span>Calendar</span> </span> </a>
				</li>
				<li>
					<a href="gmap-xml.html" class="jarvismetro-tile big-cubes bg-color-purple"> <span class="iconbox"> <i class="fa fa-map-marker fa-4x"></i> <span>Maps</span> </span> </a>
				</li>
				<li>
					<a href="invoice.html" class="jarvismetro-tile big-cubes bg-color-blueDark"> <span class="iconbox"> <i class="fa fa-book fa-4x"></i> <span>Invoice <span class="label pull-right bg-color-darken">99</span></span> </span> </a>
				</li>
				<li>
					<a href="gallery.html" class="jarvismetro-tile big-cubes bg-color-greenLight"> <span class="iconbox"> <i class="fa fa-picture-o fa-4x"></i> <span>Gallery </span> </span> </a>
				</li>
				<li>
					<a href="profile.html" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>My Profile </span> </span> </a>
				</li>
			</ul>
		</div>

		
		<!-- END SHORTCUT AREA -->

		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script data-pace-options='{ "restartOnRequestAfter": false }' src="{{asset('js/plugin/pace/pace.min.js')}}"></script>

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script>
			if (!window.jQuery) {
				document.write('<script src="{{asset('js/libs/jquery-2.1.1.min.js')}}"><\/script>');
			}
		</script>

		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script>
			if (!window.jQuery.ui) {
				document.write('<script src="{{asset('js/libs/jquery-ui-1.10.3.min.js')}}"><\/script>');
			}
		</script>

		<!-- IMPORTANT: APP CONFIG -->
		<script src="{{asset('js/app.config.js')}}"></script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
		<script src="{{asset('js/plugin/jquery-touch/jquery.ui.touch-punch.min.js')}}"></script> 

		<!-- BOOTSTRAP JS -->
		<script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="{{asset('js/notification/SmartNotification.min.js')}}"></script>

		<!-- JARVIS WIDGETS -->
		<script src="{{asset('js/smartwidgets/jarvis.widget.min.js')}}"></script>

		<!-- EASY PIE CHARTS -->
		<script src="{{asset('js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js')}}"></script>

		<!-- SPARKLINES -->
		<script src="{{asset('js/plugin/sparkline/jquery.sparkline.min.js')}}"></script>

		<!-- JQUERY VALIDATE -->
		<script src="{{asset('js/plugin/jquery-validate/jquery.validate.min.js')}}"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="{{asset('js/plugin/masked-input/jquery.maskedinput.min.js')}}"></script>

		<!-- JQUERY SELECT2 INPUT -->
		<script src="{{asset('js/plugin/select2/select2.min.js')}}"></script>

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="{{asset('js/plugin/bootstrap-slider/bootstrap-slider.min.js')}}"></script>

		<!-- browser msie issue fix -->
		<script src="{{asset('js/plugin/msie-fix/jquery.mb.browser.min.js')}}"></script>

		<!-- FastClick: For mobile devices -->
		<script src="{{asset('js/plugin/fastclick/fastclick.min.js')}}"></script>

		<!--[if IE 8]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->



		<!-- MAIN APP JS FILE -->
		<script src="{{asset('js/app.min.js')}}"></script>

		<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
		<!-- Voice command : plugin -->
		<script src="{{asset('js/speech/voicecommand.min.js')}}"></script>

		<!-- SmartChat UI : plugin -->
		<script src="{{asset('js/smart-chat-ui/smart.chat.ui.min.js')}}"></script>
		<script src="{{asset('js/smart-chat-ui/smart.chat.manager.min.js')}}"></script>
		
		<!-- PAGE RELATED PLUGIN(S) -->
		
		<!-- Flot Chart Plugin: Flot Engine, Flot Resizer, Flot Tooltip -->
		<script src="{{asset('js/plugin/flot/jquery.flot.cust.min.j')}}s"></script>
		<script src="{{asset('js/plugin/flot/jquery.flot.resize.min.js')}}"></script>
		<script src="{{asset('js/plugin/flot/jquery.flot.time.min.js')}}"></script>
		<script src="{{asset('js/plugin/flot/jquery.flot.tooltip.min.js')}}"></script>
		
		<!-- Vector Maps Plugin: Vectormap engine, Vectormap language -->
		<script src="{{asset('js/plugin/vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
		<script src="{{asset('js/plugin/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
		
		<!-- Full Calendar -->
		<script src="{{asset('js/plugin/moment/moment.min.js')}}"></script>
		<script src="{{asset('js/plugin/fullcalendar/jquery.fullcalendar.min.js')}}"></script>

		@yield('js')

	</body>

</html>