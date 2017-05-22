@extends('layouts.admin')
@section('content')
	<div class="card z-depth-4 grey lighten-4">
		<div class="card-content blue-grey white-text">
			<span class="card-title">
				Asistente - {{ $user->name }}
			</span>
		</div>
		<div class="card-content">
			<div class="row">
				<div class="col l6">
					<img src="https://graph.facebook.com/v2.8/{{ $user->social_id }}/picture?width=1920" alt="" class="responsive-img">
				</div>
				<div class="col l6">
					@locale()
					<p><strong>Nombre:</strong> {{ $user->name }}</p>
					<p><strong>Correo:</strong> {{ $user->email }}</p>
					<p><strong>Teléfono:</strong> {{ $user->profile->phone }}</p>
					<p><strong>Procedencia:</strong> {{ $user->profile->from }} - {{ $user->profile->from_name }}</p>
					<p><strong>Registrado a los cursos:</strong></p>
					<table class="table table-bordered">
						<thead>
						<tr>
							<th>Curso</th>
							<th>Fecha</th>
						</tr>
						</thead>
						<tbody>
						@foreach ($events as $event)
							<tr>
								<td>{{ $event->title }}</td>
								<td> @datetime($event->full_date) </td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection