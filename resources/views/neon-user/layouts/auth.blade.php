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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
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


</head>
<body class="page-body login-page login-form-fall" data-url="{{ Config::get('infihex.appprotocol') }}://{{ Config::get('infihex.appdomain') }}">


<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
var baseurl = '{{ Config::get("infihex.appprotocol") }}://{{ Config::get("infihex.appdomain") }}';
</script>
	
<div class="login-container">
	
	@yield('content')
	
</div>


	<!-- Bottom scripts (common) -->
	<script src="{{ Theme::url('js/gsap/main-gsap.js') }}"></script>
	<script src="{{ Theme::url('js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') }}"></script>
	<script src="{{ Theme::url('js/bootstrap.js') }}"></script>
	<script src="{{ Theme::url('js/joinable.js') }}"></script>
	<script src="{{ Theme::url('js/resizeable.js') }}"></script>
	<script src="{{ Theme::url('js/neon-api.js') }}"></script>
	<script src="{{ Theme::url('js/toastr.js') }}"></script>
	<script src="{{ Theme::url('js/jquery.validate.min.js') }}"></script>

	@yield('javascript')

	<!-- JavaScripts initializations and stuff -->
	<script src="{{ Theme::url('js/neon-custom.js') }}"></script>

	<script type="text/javascript">

		var opts = {
			"closeButton": true,
			"debug": false,
			"positionClass": "toast-top-right",
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

		@if(Session::has('global') && Session::has('globaltype'))
			@if(Session::get('globaltype') == 'info')
				toastr.info("{{ Session::get('global') }}", String("{{ Session::get('globaltype') }}").toUpperCase(), opts);
			@elseif(Session::get('globaltype') == 'warning')
				toastr.warning("{{ Session::get('global') }}", String("{{ Session::get('globaltype') }}").toUpperCase(), opts);
			@elseif(Session::get('globaltype') == 'danger')
				toastr.error("{{ Session::get('global') }}", String("{{ Session::get('globaltype') }}").toUpperCase(), opts);
			@elseif(Session::get('globaltype') == 'success')
				toastr.success("{{ Session::get('global') }}", String("{{ Session::get('globaltype') }}").toUpperCase(), opts);
			@endif

		@endif

	</script>
</body>
</html>