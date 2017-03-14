@extends('layouts.admin')
@section('content')
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">Lista de Usuarios</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-6">
						<img src="https://graph.facebook.com/v2.8/{{ $user->social_id }}/picture?width=1920" alt="" class="img-responsive">
					</div>
					<div class="col-md-6">
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
								@foreach ($user->bookmarks as $bookmark)
									<tr>
										<td>{{ $bookmark->course->name }}</td>
										<td> @datetime($bookmark->course->full_date) </td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection