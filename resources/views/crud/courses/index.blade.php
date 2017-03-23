@extends('layouts.admin')
@section('content')
	<div class="container">
		<div class="card z-depth-4 grey lighten-4">
			<div class="card-content blue-grey white-text">
				<span class="card-title">
					Lista de Cursos
				</span>
			</div>
			<div class="card-content">
				<table class="bordered centered">
					<thead>
						<tr>
							<th></th>
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
								<td>{{ $course->title }}</td>
								<td>{{ $course->quota }}</td>
								<td>
									<a href="{{ route('crud.courses.show', ['id' => $course->id]) }}" class="btn waves-effect waves-light green">Ver</a>
									<a href="{{ route('crud.courses.edit', ['id' => $course->id]) }}" class="btn waves-effect waves-light orange">Modificar</a>
									<a href="{{ route('crud.courses.delete', ['id' => $course->id]) }}" class="btn waves-effect waves-light red delete">Eliminar</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection