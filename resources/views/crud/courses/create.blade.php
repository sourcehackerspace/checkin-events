@extends('layouts.admin')
@section('content')
<div class="container">
	<div class="card">
		<div class="card-content blue-grey white-text">
			<span class="card-title">
				Crear Curso
			</span>
		</div>
		<div class="card-content">
			<form action="{{ route('crud.courses.storage') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				
				<div class="row">
					<div class="input-field col l6">
						<input type="text" name="title" class="validate" id="titleInput" value="{{ old('title') }}">
						<label for="titleInput">Titulo del curso</label>
						{{-- @if ($errors->has('title'))
							<span class="help-block">
								<strong>{{ $errors->first('title') }}</strong>
							</span>
						@endif --}}
					</div>
					<div class="input-field col l6">
						<input type="text" name="subtitle" class="validate" id="subtitleInput" value="{{ old('subtitle') }}">
						<label for="subtitleInput">Subtitulo</label>
						{{-- @if ($errors->has('subtitle'))
							<span class="help-block">
								<strong>{{ $errors->first('subtitle') }}</strong>
							</span>
						@endif --}}
					</div>
				</div>



				<div class="input-field">
					<input type="text" name="address" class="validate" id="addressInput" value="{{ old('address') }}">
					<label for="addressInput">Dirección</label>
					{{-- @if ($errors->has('address'))
						<span class="help-block">
							<strong>{{ $errors->first('address') }}</strong>
						</span>
					@endif --}}
				</div>

				<div class="row">
					<div class="input-field col l4">
						<input type="date" name="date" class="datepicker" value="{{ old('date') }}">
						<label for="dateInput" class="active">Fecha del curso</label>
						{{-- @if ($errors->has('date'))
							<span class="help-block">
								<strong>{{ $errors->first('date') }}</strong>
							</span>
						@endif --}}
					</div>
					<div class="input-field col l4">
						<input type="time" name="time" class="validate" value="{{ old('time') }}" id="timeInput">
						<label for="timeInput" class="active">Hora del curso</label>
						{{-- @if ($errors->has('time'))
							<span class="help-block">
								<strong>{{ $errors->first('time') }}</strong>
							</span>
						@endif --}}
					</div>
					<div class="input-field col l4">
						<input type="number" name="quota" class="validate" id="qoutaInput" value="{{ old('quota') }}">
						<label for="qoutaInput">Cupo del curso</label>
						{{-- @if ($errors->has('quota'))
							<span class="help-block">
								<strong>{{ $errors->first('quota') }}</strong>
							</span>
						@endif --}}
					</div>
				</div>

				<div class="col l12">
					<label for="descriptionInput" class="active">Descripción</label>
					<textarea name="description" id="descriptionInput">{{ old('description') }}</textarea>
					{{-- @if ($errors->has('description'))
						<span class="help-block">
							<strong>{{ $errors->first('description') }}</strong>
						</span>
					@endif --}}
				</div>
				<div class="file-field input-field">
					<div class="btn">
						<span>Imagen del Curso</span>
						<input type="file" name="image">
					</div>
					<div class="file-path-wrapper">
						<input class="file-path validate" type="text">
					</div>
				</div>
				{{-- <div class="input-field">
					<input type="file" name="image" id="imageCourse">
					<label for="imageCourse">Imagen del Curso</label> --}}
					{{-- <p class="help-block">Sube una imagen del curso.</p> --}}
				{{-- </div> --}}
				<button type="submit" class="btn">Crear</button>
			</form>
		</div>
	</div>
</div>
@endsection
@section('js')
<script src="{{ asset('materialnote/js/ckMaterializeOverrides.js') }}"></script>
<script src="{{ asset('materialnote/js/materialNote.js') }}"></script>
<script>
	$(document).ready(function(){
		$('#descriptionInput').materialnote();
		$('.datepicker').pickadate({
			selectMonths: true, // Creates a dropdown to control month
			selectYears: 15 // Creates a dropdown of 15 years to control year
		});
	});
</script>
@endsection