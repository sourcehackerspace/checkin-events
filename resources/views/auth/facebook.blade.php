@extends('layouts.app')

@section('content')
@locale()
<div class="container">
	<div class="row">
		<div class="col l12">
			<h2>{{ $course->name }}</h2>
		</div>
		<div class="col l8">
			<div class="card">
				<div class="card-image">
					<img src="http://lorempixel.com/640/480/city/">
				</div>
			</div>
			{{-- <img src="{{ asset('storage/'.$course->image) }}" class="img-responsive" alt="{{ $course->slug }}"> --}}
		</div>
		<div class="col l4">
			<div class="card blue darken-1">
				<div class="card-content white-text">
					<span class="card-title"><strong>Datos:</strong></span>
					<p><strong>Dirección:</strong> {{ $course->address }}</p><br>
					<p><strong>Fecha:</strong> @datetime($course->date.' '.$course->time)</p>
				</div>
			</div>
			<div class="card green darken-1">
				<div class="card-content white-text">
					{{-- <span class="card-title">Regsitrate:</span> --}}
					<h4><strong>Costo: </strong>$500.00</h4>
					<h5><strong>Pago en: </strong>Oxxo</h5>
					<p>El registro se hace con tu cuenta de facebook.</p>
					<a href="{{ route('auth.facebook') }}" class="waves-effect waves-light btn-large"> Registrarme </a>
				</div>
{{-- 				<div class="card-action">
				</div>
 --}}			</div>
		</div>
		<div class="col l12">
			<h5><strong>Tema:  </strong>{{ $course->topic }}</h5>
			<h5><strong>Descripción:</strong></h5>
			<p>{!! $course->description !!}</p>
		</div>
	</div>
</div>
@endsection
