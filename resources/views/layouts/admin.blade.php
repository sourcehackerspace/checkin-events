<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

	<link href="{{ asset('summernote/summernote.css') }}" rel="stylesheet">

	<!-- Scripts -->
	<script>
		window.Laravel = {!! json_encode([
			'csrfToken' => csrf_token(),
		]) !!};
	</script>
	<style>
		.alert-content{
			position:fixed;
			top: 50px;
			right: 0px;
			z-index: 90;
			width: 35%;
		}
	</style>
</head>
<body>
	<div id="app">
		<nav class="navbar navbar-default navbar-static-top">
			<div class="container">
				<div class="navbar-header">

					<!-- Collapsed Hamburger -->
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<!-- Branding Image -->
					<a class="navbar-brand" href="{{ url('/') }}">
						Cursos
					</a>
				</div>

				<div class="collapse navbar-collapse" id="app-navbar-collapse">
					<!-- Left Side Of Navbar -->
					<ul class="nav navbar-nav">
						&nbsp;
					</ul>

					<!-- Right Side Of Navbar -->
					<ul class="nav navbar-nav navbar-right">
						<!-- Authentication Links -->
						@if (Auth::guest())
							{{-- <li><a href="{{ route('login') }}">Login</a></li> --}}
							{{-- <li><a href="{{ route('register') }}">Register</a></li> --}}
						@else
							@include('layouts.menu')
						@endif
					</ul>
				</div>
			</div>
		</nav>
		@include('layouts.alerts')
		@yield('content')
	</div>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="{{ asset('summernote/summernote.min.js') }}"></script>
	<script>
		$('document').ready(function(){
			$('.delete').on('click', function(event){
				if(!confirm('¿Está seguro que quiere eliminar esto?')){
					event.preventDefault();
				}
			});
		});
	</script>
	@yield('js')
</body>
</html>
