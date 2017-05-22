@extends('layouts.admin')
@section('content')
	<div class="card z-depth-4 grey lighten-4">
		<div class="card-content blue-grey white-text">
			<span class="card-title">
				Lista de Eventos
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
					@foreach($events as $event)
						<tr>
							<td>
								<div style="max-width: 50px;">
									<img src="{{ asset('storage/'.$event->image) }}" class="responsive-img">
								</div>
							</td>
							<td>{{ $event->title }}</td>
							<td>{{ $event->quota }}</td>
							<td>
								<a href="{{ route('assistants.index', ['slug' => $event->slug]) }}" class="btn waves-effect waves-light blue">Asistentes</a>
								<a href="{{ route('crud.events.show', ['id' => $event->id]) }}" class="btn waves-effect waves-light green">Ver</a>
								<a href="{{ route('crud.events.edit', ['id' => $event->id]) }}" class="btn waves-effect waves-light orange">Modificar</a>
								<a href="{{ route('crud.events.delete', ['id' => $event->id]) }}" class="btn waves-effect waves-light red delete">Eliminar</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection