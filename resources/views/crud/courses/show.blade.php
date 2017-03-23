@extends('layouts.admin')
@section('content')
	@locale
	<div class="container">
		<div class="card z-depth-4 grey lighten-4">
			<div class="card-content blue-grey white-text">
				<div class="card-title">
					{{ $course->title }}
				</div>
				<p>{{ $course->subtitle }}</p>
			</div>
			<div class="card-content">
				<div class="row">
					<div class="col l6">
						<img src="{{ asset('storage/'.$course->image) }}" alt="" class="img-responsive">
					</div>
					<div class="col l6">
						<p><strong>Descripcion:</strong> {!! $course->description !!}</p>
						<p><strong>Dirección:</strong> {{ $course->address }}</p>
						<p><strong>Fecha:</strong> @datetime($course->date.' '.$course->time)</p>
						<p><strong>Cupo:</strong> {{ $course->quota }} Lugares</p>
						<p><strong>Ocupados:</strong> {{ $course->busy }} Lugares</p>
						<p><strong>Restantes:</strong> {{ $course->remaining }} Lugares</p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection