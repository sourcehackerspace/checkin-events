@extends('layouts.admin')
@section('content')
	@locale
	<div class="container">
		<div class="card z-depth-4 grey lighten-4">
			<div class="card-content blue-grey white-text">
				<div class="card-title">
					{{ $event->title }}
				</div>
				<p>{{ $event->summary }}</p>
			</div>
			<div class="card-content">
				<div class="row">
					<div class="col l6">
						<img src="{{ asset('storage/'.$event->image) }}" alt="" class="img-responsive">
					</div>
					<div class="col l6">
						<p><strong>Descripcion:</strong> {!! $event->description !!}</p>
						<p><strong>Dirección:</strong> {{ $event->address }}</p>
						<p><strong>Fecha:</strong> @datetime($event->date.' '.$event->time)</p>
						<p><strong>Cupo:</strong> {{ $event->quota }} Lugares</p>
						<p><strong>Ocupados:</strong> {{ $event->busy }} Lugares</p>
						<p><strong>Restantes:</strong> {{ $event->remaining }} Lugares</p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection