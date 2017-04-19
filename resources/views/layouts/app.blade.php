<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Styles -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

	<!-- Scripts -->
	<script>
		window.Laravel = {!! json_encode([
			'csrfToken' => csrf_token(),
		]) !!};
	</script>
</head>
<body>
	<div id="app">
		<nav>
			<div class="nav-wrapper">
				<a href="{{ url('/') }}" class="brand-logo">hashevent</a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li><a href="{{ route('events.list') }}">Eventos</a></li>
					<li><a href="{{ route('auth.login') }}">Entrar</a></li>
				</ul>
			</div>
		</nav>
		@include('layouts.alerts')
		@yield('content')
	</div>
	@include('layouts.footer')
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
	<script>
	</script>
	@yield('js')
</body>
</html>
