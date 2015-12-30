<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<title>@yield('title') - {{ Config::get('infihex.appname') }}</title>

	<link rel="stylesheet" href="{{ Theme::url('js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css') }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="{{ Theme::url('css/font-icons/entypo/css/entypo.css') }}">
	<link rel="stylesheet" href="{{ Theme::url('css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ Theme::url('css/neon-core.css') }}">
	<link rel="stylesheet" href="{{ Theme::url('css/neon-theme.css') }}">
	<link rel="stylesheet" href="{{ Theme::url('css/neon-forms.css') }}">
	<link rel="stylesheet" href="{{ Theme::url('css/custom.css') }}">

	<script src="{{ Theme::url('js/jquery-1.11.0.min.js') }}"></script>
	<script>$.noConflict();</script>

	<!--[if lt IE 9]><script src="{{ Theme::url('js/ie8-responsive-file-warning.js') }}"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	@yield('css')

</head>
<body class="page-body" data-url="{{ Config::get('infihex.appprotocol') }}://{{ Config::get('infihex.appname') }}">

<div class="page-container">

	<div class="sidebar-menu">
		<div class="sidebar-menu-inner">
			<header class="logo-env">
				<div class="logo">
					<a href="{{ route('admin') }}"><img src="{{ Theme::url('images/membra@2x.png') }}" alt="" width="120"></a>
				</div>
				<div class="sidebar-mobile-menu visible-xs">
					<a href="#" class="with-animation">
						<i class="entypo-menu"></i>
					</a>
				</div>
			</header>
			<div id="main-menu" class="main-menu">
				<li class="@if(Request::is('admin')){{'active'}} @endif">
					<a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> <span class="title">Dashboard</span></a>
				</li>
				<li class="@if(Request::is('admin/members')){{'active'}} @endif">
					<a href="{{ route('admin') }}"><i class="fa fa-users"></i> <span class="title">Members</span></a>
				</li>
				<li class="@if(Request::is('admin/news*')){{'active opened'}} @endif has-sub root-level">
					<a><i class="fa fa-newspaper-o"></i> <span class="title">News</span></a>
					<ul>
						<li class="@if(Request::is('admin/news*') && !Request::is('admin/news/categories*')){{'active'}} @endif"><a href="{{ route('admin-news') }}"><i class="fa fa-list-alt"></i> <span class="title">Articles</span></a></li>
						<li class="@if(Request::is('admin/news/categories*')){{'active'}} @endif"><a href="{{ route('admin-news-category') }}"><i class="fa fa-tag"></i> <span class="title">Categories</span></a></li>
					</ul>
				</li>
				<li><a href="#"><i class="fa fa-shopping-basket"></i> <span class="title">Webshop</span></a></li>
				<li><a href="#"><i class="fa fa-street-view"></i> <span class="title">Seating</span></a></li>
				<li><a href="#"><i class="fa fa-sitemap"></i> <span class="title">Compo</span></a></li>
			</div>
		</div>
	</div>

	<div class="main-content">

		@yield('content')

		<div class="row">
			<div class="col-md-12">
				<footer class="main">
					<div class="row">
						<div class="col-md-6">
							<p>&copy; {{ date('Y') }}, Infihex</p>
							<p class="text-muted"><small>Load time: {{ round((microtime(true) - LARAVEL_START), 3) }}s</small></p>
						</div>
						<div class="col-md-6 text-right">
							<p>
								<a href="http://jira.infihex.com/projects/MEM/issues" target="_blank">{{Config::get('infihex.appname') . ' ' . Config::get('infihex.appversion') . ' ' . Config::get('infihex.appversiontype') }}</a>
								@if(Config::get('app.debug')) <b>(<a href="/resetdb" class="text-danger">DEBUG MODE</a>)</b> @endif by <a href="https://infihex.com/" target="_blank">Infihex</a>
							</p>
						</div>
				</footer>
			</div>
		</div>

	</div>

	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="{{ Theme::url('js/jvectormap/jquery-jvectormap-1.2.2.css') }}">
	<link rel="stylesheet" href="{{ Theme::url('js/rickshaw/rickshaw.min.css') }}">

	<!-- Bottom scripts (common) -->
	<script src="{{ Theme::url('js/gsap/main-gsap.js') }}"></script>
	<script src="{{ Theme::url('js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') }}"></script>
	<script src="{{ Theme::url('js/bootstrap.js') }}"></script>
	<script src="{{ Theme::url('js/joinable.js') }}"></script>
	<script src="{{ Theme::url('js/resizeable.js') }}"></script>
	<script src="{{ Theme::url('js/neon-api.js') }}"></script>
	<script src="{{ Theme::url('js/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>


	<!-- Imported scripts on this page -->
	<script src="{{ Theme::url('js/jvectormap/jquery-jvectormap-europe-merc-en.js') }}"></script>
	<script src="{{ Theme::url('js/jquery.sparkline.min.js') }}"></script>
	<script src="{{ Theme::url('js/rickshaw/vendor/d3.v3.js') }}"></script>
	<script src="{{ Theme::url('js/rickshaw/rickshaw.min.js') }}"></script>
	<script src="{{ Theme::url('js/toastr.js') }}"></script>
	<script src="{{ Theme::url('js/neon-chat.js') }}"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="{{ Theme::url('js/neon-custom.js') }}"></script>

	<script type="text/javascript">

		var opts = {
			"closeButton": true,
			"debug": false,
			"positionClass": "toast-bottom-right",
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		};

		@if(Session::has('message') && Session::has('messagetype'))
			@if(Session::get('messagetype') == 'info')
				toastr.info("{{ Session::get('message') }}", String("{{ Session::get('messagetype') }}").toUpperCase(), opts);
			@elseif(Session::get('messagetype') == 'warning')
				toastr.warning("{{ Session::get('message') }}", String("{{ Session::get('messagetype') }}").toUpperCase(), opts);
			@elseif(Session::get('messagetype') == 'error')
				toastr.error("{{ Session::get('message') }}", String("{{ Session::get('messagetype') }}").toUpperCase(), opts);
			@elseif(Session::get('messagetype') == 'success')
				toastr.success("{{ Session::get('message') }}", String("{{ Session::get('messagetype') }}").toUpperCase(), opts);
			@endif

		@endif

	</script>

</body>
</html>