@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col l4 offset-l4">
			<div class="card-panel grey lighten-3 z-depth-4">
				<div class="row">
					<div class="col l12 center">
						<img src="http://lorempixel.com/100/100/city/" alt="" class="circle img-responsive">
						<h5>Bienvenido</h5>
					</div>
				</div>
				<form class="" method="POST" action="{{ route('auth.login') }}">
					{{ csrf_field() }}
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
		{{-- <div class="col l4">
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" >


						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<label for="password" class="col-md-4 control-label">Password</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control" name="password" required>

								@if ($errors->has('password'))
									<span class="help-block">
										<strong>{{ $errors->first('password') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-8 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Login
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div> --}}
	</div>
</div>
@endsection
