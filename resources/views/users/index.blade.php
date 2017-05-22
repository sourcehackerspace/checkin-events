@extends('layouts.admin')
@section('content')
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">Lista de Usuarios</div>
			{{-- <div class="panel-body">
			</div> --}}
			<table class="table">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Correo</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>
								<a href="{{ route('assistants.show',['id' => $user->id]) }}" class="btn btn-primary">Ver</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection