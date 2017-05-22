@extends('layouts.admin')

@section('content')
	<div class="row">
		<div class="col l4 offset-l4">
			<div class="card-panel grey lighten-3 z-depth-4">
				<div class="row">
					<div class="col l12 center">
						<img src="{{ asset('img/admin.png') }}" alt="" class="circle" style="width: 80px; height: auto;">
						<h5>Bienvenido</h5>
						<a href="{{ route('login.facebook') }}" class="btn facebook">Entrar con Facebook</a>
					</div>
				</div>
				<form class="" method="POST" action="{{ route('auth.login') }}">
					{{ csrf_field() }}
					<p class="center">O</p>
					<div class="row">
						<div class="input-field col l12">
							<i class="material-icons prefix">perm_identity</i>
							<input id="email" type="email" name="email" class="{{ $errors->has('email') ? 'validate invalid' : '' }}" value="{{ old('email') }}" required>
							<label for="email" data-error="{{ $errors->has('email') ? $errors->first('email') : 'Correo no valido' }}">Cuenta de correo</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<i class="material-icons prefix">lock_outline</i>
							<input id="password" type="password" name="password" required>
							<label for="password">Contraseña</label>
						</div>
					</div>
					<p>
						<input type="checkbox" id="test5" name="remember" />
						<label for="test5">Recuerdame</label>
					</p>
					{{-- <p>Algo de texto</p> --}}
					<div class="row">
						<div class="input-field col l12">
							<button type="submit" class="btn waves-effects waves-light col l12">
								Login
							</button>
						</div>
					</div>
				</form>
				
			</div>
		</div>
	</div>
@endsection
