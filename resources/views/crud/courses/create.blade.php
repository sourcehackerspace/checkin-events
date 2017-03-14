@extends('layouts.admin')
@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">Crear Curso</div>
		<div class="panel-body">
			<form action="{{ route('crud.courses.storage') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}

				<div class="row">
					<div class="col-md-6">
						<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
							<label class="control-label" for="nameInput">Nombre del curso</label>
							<input type="text" name="name" class="form-control" id="nameInput" value="{{ old('name') }}" placeholder="Desarrollo de aplicaciones web...">
							@if ($errors->has('name'))
								<span class="help-block">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group {{ $errors->has('topic') ? ' has-error' : '' }}">
							<label class="control-label" for="topicInput">Tema</label>
							<input type="text" name="topic" class="form-control" id="topicInput" value="{{ old('topic') }}" placeholder="Desarrollo web">
							@if ($errors->has('topic'))
								<span class="help-block">
									<strong>{{ $errors->first('topic') }}</strong>
								</span>
							@endif
						</div>
					</div>
				</div>



				<div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
					<label class="control-label" for="addressInput">Dirección</label>
					<input type="text" name="address" class="form-control" id="addressInput" value="{{ old('address') }}" placeholder="Calle, Numero, Colonia, Estado.">
					@if ($errors->has('address'))
						<span class="help-block">
							<strong>{{ $errors->first('address') }}</strong>
						</span>
					@endif
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
							<label class="control-label" for="dateInput">Fecha del curso</label>
							<input type="date" name="date" class="form-control" value="{{ old('date') }}" id="dateInput">
							@if ($errors->has('date'))
								<span class="help-block">
									<strong>{{ $errors->first('date') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group {{ $errors->has('time') ? ' has-error' : '' }}">
							<label class="control-label" for="timeInput">Hora del curso</label>
							<input type="time" name="time" class="form-control" value="{{ old('time') }}" id="timeInput">
							@if ($errors->has('time'))
								<span class="help-block">
									<strong>{{ $errors->first('time') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group {{ $errors->has('quota') ? ' has-error' : '' }}">
							<label class="control-label" for="qoutaInput">Cupo del curso</label>
							<input type="number" name="quota" class="form-control" id="qoutaInput" value="{{ old('quota') }}" placeholder="16">
							@if ($errors->has('quota'))
								<span class="help-block">
									<strong>{{ $errors->first('quota') }}</strong>
								</span>
							@endif	
						</div>
					</div>
				</div>

				<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
					<label class="control-label" for="descriptionInput">Descripción</label>
					<textarea name="description" class="form-control" id="descriptionInput" cols="30" rows="10">{{ old('description') }}</textarea>
					@if ($errors->has('description'))
						<span class="help-block">
							<strong>{{ $errors->first('description') }}</strong>
						</span>
					@endif
				</div>

				<div class="form-group">
					<label for="imageCourse">Imagen del Curso</label>
					<input type="file" name="image" id="imageCourse">
					<p class="help-block">Sube una imagen del curso.</p>
				</div>
				<button type="submit" class="btn btn-success">Crear</button>
			</form>
		</div>
	</div>
</div>
@endsection
@section('js')
<script>
	$('document').ready(function(){
		$('#descriptionInput').summernote();
	});
</script>
@endsection