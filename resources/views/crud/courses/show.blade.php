@extends('layouts.admin')
@section('content')
	@locale
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">{{ $course->name }}</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-6">
						<img src="{{ asset('storage/'.$course->image) }}" alt="" class="img-responsive">
					</div>
					<div class="col-md-6">
						<p><strong>Tema:</strong> {{ $course->topic }}</p>
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