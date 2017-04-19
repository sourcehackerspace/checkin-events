@extends('layouts.admin')
@section('content')
	<div class="card">
		<div class="card-content blue-grey white-text">
			<span class="card-title">
				Modificar Evento
			</span>
		</div>
		<div class="card-content">
			<form action="{{ route('crud.events.update', ['id' => $event->id]) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				
				<div class="row">
					<div class="input-field col l6">
						<input type="text" name="title" class="validate{{ $errors->has('title') ? ' invalid' : '' }}" id="titleInput" value="{{ old('title') ? old('title') : $event->title }}">
						@if ($errors->has('title'))
							<label for="titleInput" class="active" data-error="{{ $errors->first('title') }}">¿Que titulo va tener?</label>
						@else
							<label for="titleInput" class="{{ old('title') ? 'active' : '' }}">¿Que titulo va tener?</label>
						@endif
					</div>
					<div class="input-field col l6">
						<input type="text" name="summary" class="validate{{ $errors->has('summary') ? ' invalid' : '' }}" id="summaryInput" value="{{ old('summary') ? old('summary') : $event->summary }}" data-length="100">
						@if ($errors->has('summary'))
							<label for="summaryInput" class="active" data-error="{{ $errors->first('summary') }}">Resume tu evento en menos de 100 caracteres</label>
						@else
							<label for="summaryInput" class="{{ old('summary') ? 'active' : '' }}">Resume tu evento en menos de 100 caracteres</label>
						@endif
					</div>
				</div>

				<div class="input-field">
					<input type="text" name="address" class="validate{{ $errors->has('address') ? ' invalid' : '' }}" id="addressInput" value="{{ old('address') ? old('address') : $event->address }}">
					@if ($errors->has('address'))
						<label for="addressInput" class="active" data-error="{{ $errors->first('address') }}">¿En que lugar va ser tu evento?</label>
					@else
						<label for="addressInput" class="{{ old('address') ? 'active' : '' }}">¿En que lugar va ser tu evento?</label>
					@endif
				</div>

				<div class="row">
					<div class="input-field col l4">
						<input type="date" id="dateInput" name="date" class="datepicker {{ $errors->has('date') ? 'validate invalid' : '' }}" data-value="{{ old('date') ? old('date') : $event->date }}">
						@if ($errors->has('date'))
							<label for="dateInput" class="active" data-error="{{ $errors->first('date') }}">¿Que día es tu evento?</label>
						@else
							<label for="dateInput" class="{{ old('date') ? 'active' : '' }}">¿Que día es tu evento?</label>
						@endif
					</div>
					<div class="input-field col l4">
						<input type="time" name="time" class="{{ $errors->has('time') ? 'validate invalid' : '' }}" value="{{ old('time') ? old('time') : $event->time }}" id="timeInput">
						@if ($errors->has('time'))
							<label for="timeInput" class="active" data-error="{{ $errors->first('time') }}">¿A que hora es tu evento?</label>
						@else
							<label for="timeInput" class="active">¿A que hora es tu evento?</label>
						@endif
					</div>
					<div class="input-field col l4">
						<input type="number" name="quota" class="validate{{ $errors->has('qouta') ? ' invalid' : '' }}" id="qoutaInput" value="{{ old('quota') ? old('quota') : $event->quota }}" min="1">
						@if ($errors->has('quota'))
							<label for="qoutaInput" class="active" data-error="{{ $errors->first('quota') }}">¿Cual es el cupo de tu evento?</label>
						@else
							<label for="qoutaInput" class="{{ old('quota') ? 'active' : '' }}">¿Cual es el cupo de tu evento?</label>
						@endif
					</div>
				</div>

				<div class="row valign-wrapper">
					<div class="col l5">
						<img src="{{ asset('storage/'.$event->image) }}" alt="" class="responsive-img materialboxed">
					</div>
					<div class="col l7">
						<div class="file-field input-field">
							<div class="btn">
								<span>Cambiar imagen del Evento</span>
								<input type="file" name="image">
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text">
							</div>
						</div>
					</div>
				</div>

				

				<div class="row">
					<div class="col l12">
						<label for="descriptionInput" class="active">Describe tu evento</label>
						<textarea name="description" id="descriptionInput">{{ old('description') ? old('description') : $event->description }}</textarea>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s6">
						<select name="type">
							@foreach ($types as $type)
								<option value="{{ $type->id }}" {{ $event->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
							@endforeach
						</select>
						<label>Secciona un tipo</label>
					</div>
					<div class="input-field col s6">
						<select name="topic">
							@foreach ($topics as $topic)
								<option value="{{ $topic->id }}" {{ $event->topic_id == $topic->id ? 'selected' : '' }}>{{ $topic->name }}</option>
							@endforeach
						</select>
						<label>Secciona un tema</label>
					</div>
				</div>

				<div class="row">
					<div class="col l6">
						<p>
							<input type="checkbox" id="cost" name="hascost" {{ $event->isfree ? '' : 'checked'}}/>
							<label for="cost">¿Tu evento tiene algún costo?</label>
						</p>
						<p>Acualmente solo se cuenta con Oxxo Pay de Conekta</p>
					</div>
					<div class="col l6">
						<div class="row valign-wrapper payment" style="display: none;">
							<div class="col l7">
								<div class="input-field">
									<i class="fa fa-usd prefix" aria-hidden="true"></i>
									<input type="number" name="cost" class="validate" id="costInput" value="{{ old('cost') || $event->isfree ? old('cost') : $event->cost }}" min="20" step="0.01" disabled>
									<label for="costInput" data-error="El pago minimo que se acepta es de $20.00 MXN">Costo Ejemplo: 200.00</label>
								</div>
							</div>
							<div class="col l5">
								<h6 class="left-align teal-text">MXN</h6>
							</div>
						</div>
					</div>
				</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui alias nulla fuga porro quos sunt voluptate assumenda quas! Perferendis tempore consectetur quos sapiente nostrum amet, fugit vitae libero, explicabo alias.</p>
				<br>
				<div class="row">
					<button type="submit" class="btn accent waves-effect waves-light col s12 l4 offset-l4">modicar el evento</button>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('js')
<script src="{{ asset('materialnote/js/ckMaterializeOverrides.js') }}"></script>
<script src="{{ asset('materialnote/js/materialNote.js') }}"></script>
<script>
	$(document).ready(function(){
		$('select').material_select();

		$('#descriptionInput').materialnote({
			followingToolbar: false
		});

		$('.datepicker').pickadate({
			monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
			weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
			weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
			// Buttons
			today: 'Hoy',
			clear: 'Limpiar',
			close: 'Cerrar',

			// Accessibility labels
			labelMonthNext: 'Mes Siguiente',
			labelMonthPrev: 'Mes Anterior',
			labelMonthSelect: 'Selecciona un Mes',
			labelYearSelect: 'Selecciona un Año',
			formatSubmit: 'yyyy/mm/dd',
			hiddenName: true,
			selectMonths: true, // Creates a dropdown to control month
			selectYears: 15 // Creates a dropdown of 15 years to control year
		});

		if($('#cost').prop('checked')){
			$('#costInput').attr('disabled', false);
			$('.payment').show(500);
		}

		$("#cost").on('change', function(){
			if($(this).prop('checked')){
				$('#costInput').attr('disabled', false);
				$('.payment').show(500);
			}else{
				$('.payment').hide(500);
				$('#costInput').attr('disabled', true);
			}
		});
	});
</script>
@endsection