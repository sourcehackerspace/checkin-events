@extends('layouts.admin')
@section('content')
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">Lista de Cursos</div>
			{{-- <div class="panel-body">
			</div> --}}
			<table class="table">
				<thead>
					<tr>
						<td></td>
						<th>Nombre</th>
						<th>Cupo</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($courses as $course)
						<tr>
							<td>
								<div style="max-width: 50px;">
									<img src="{{ asset('storage/'.$course->image) }}" class="img-responsive">
								</div>
							</td>
							<td>{{ $course->name }}</td>
							<td>{{ $course->quota }}</td>
							<td>
								<a href="{{ route('crud.courses.show', ['id' => $course->id]) }}" class="btn btn-primary">Ver</a>
								<a href="{{ route('crud.courses.edit', ['id' => $course->id]) }}" class="btn btn-warning">Modificar</a>
								<a href="{{ route('crud.courses.delete', ['id' => $course->id]) }}" class="btn btn-danger delete">Eliminar</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection