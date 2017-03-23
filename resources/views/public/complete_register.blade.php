@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col s12 m12 l6">
			<div class="card white-text" style="background-color: #233945;">
				<div class="card-content">
					<span class="card-title" style="font-weight: 700;">{{ $course->title }}</span>
				</div>
				<div class="card-image">
						<img src="http://lorempixel.com/640/480/city/" class="img-responsive">
						{{-- <img src="{{ asset('storage/'.$course->image) }}" class="img-responsive" alt="{{ $course->slug }}"> --}}
				</div>
				<div class="card-content">
					<h4 style="margin-top: 0px; color: #7fc719;"><strong>Costo: </strong>$500.00</h4>
					<h5 style="">Pago en Oxxo</h5>
					<p><strong>Dirección:</strong> {{ $course->address }}</p>
					<p><strong>Fecha de inicio:</strong> @datetime($course->date.' '.$course->time)</p>
				</div>
			</div>
		</div>
		<div class="col s12 m12 l6">
			<div class="card">
				<div class="card-content white-text" style="background-color: #7fc719;">
					<span class="card-title">Completa tu registro</span>
				</div>
				<div class="card-content">
					<form method="POST">
						{{ csrf_field() }}

						<div class="input-field">
							<input id="name" type="text" name="name" value="{{ $name }}" required disabled>
							<label for="name" class="active grey-text text-darken-3">Nombre</label>
						</div>

						<div class="input-field">
							<input id="email" type="email" name="email" value="{{ $email }}" required disabled>
							<label for="email" class="active grey-text text-darken-3">Correo</label>
						</div>

						<div class="input-field">
							<input id="phone" type="text" class="validate" name="phone" value="{{ old('phone') }}" >
							<label for="phone">Teléfono</label>
							@if ($errors->has('phone'))
								<span class="help-block">
									<strong>{{ $errors->first('phone') }}</strong>
								</span>
							@endif
						</div>
						
						<div class="row">
							<div class="col m12 l6">
								<label>¿De donde nos visitas?</label>
								<select name="from" id="slcfrom" class="browser-default">
									<option value="escuela">Escuela</option>
									<option value="empresa">Empresa</option>
									<option value="organización">Organización</option>
									<option value="otro">Otro</option>
								</select>
							</div>

							<div class="input-field col m12 l6">
								<input type="text" class="validate" name="from_name" value="{{ old('from_name') }}" >
								<label id="from_name">Escuela</label>

								@if ($errors->has('from_name'))
									<span class="help-block">
										<strong>{{ $errors->first('from_name') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<br>
						<div class="row">
							<div class="input-field">
								<button type="submit" class="btn col l8 offset-l2 waves-effect waves-light red darken-1">
									Terminar Registro
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script>
	$(document).ready(function(){
		// $('#slcfrom').material_select();
		$('#slcfrom').on('change', function(event){
			var name = capitalizeFirstLetter($(this).val());
			$('#from_name').text(name);
		})
	});
	function capitalizeFirstLetter(string) {
		return string.charAt(0).toUpperCase() + string.slice(1);
	}
</script>
@endsection
