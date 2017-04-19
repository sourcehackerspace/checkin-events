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
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	
	@yield('styles')
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
	<header>
		<div class="navbar-fixed">
			<nav>
				<div class="nav-wrapper">
					<a href="#!" class="brand-logo">hashevent</a>
					<ul id="nav-mobile" class="right hide-on-med-and-down">
						@if (Auth::guest())
							<li><a href="{{ route('events.list') }}">Eventos</a></li>
							<li><a href="{{ route('auth.login') }}">Entrar</a></li>
						@else
							@include('layouts.menu')
						@endif
					</ul>
				</div>
			</nav>
		</div>
	</header>
	<main>
		<div class="">
			<div class="row">
				@if (Route::currentRouteName() == "auth.login")
					<div class="col s10 offset-s1">
						@include('layouts.alerts')
						@yield('content')
					</div>
				@else
					<div class="col s3 no-padding">
						@include('layouts.sidemenu')
					</div>
					<div class="col s9">
						@include('layouts.alerts')
						@yield('content')
					</div>
				@endif
			</div>
		</div>
	</main>
	<footer></footer>
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
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
