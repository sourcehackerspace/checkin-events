@extends('layouts.app')

@section('content')
@locale()
<div class="container">
	<div class="row">
		<div class="col l12">
				<div class="center">
					<h3>{{ $event->title }}</h3>
				</div>
{{-- 			<div class="card">
			</div> --}}	
		</div>
		<div class="col l8">
			<div class="card">
				<div class="card-image">
					<img src="http://lorempixel.com/640/480/city/" class="img-responsive">
			{{-- <img src="{{ asset('storage/'.$event->image) }}" class="img-responsive" alt="{{ $event->slug }}"> --}}
				</div>
			</div>
		</div>
		<div class="col l4">
			<div class="card blue darken-1">
				<div class="card-content white-text">
					<span class="card-title"><strong>Datos</strong></span>
					<p><strong>Dirección:</strong> {{ $event->address }}</p><br>
					<p><strong>Fecha de inicio:</strong> @datetime($event->date.' '.$event->time)</p>
				</div>
			</div>
			<div class="card green accent-4">
				<div class="card-content white-text">
					{{-- <span class="card-title">Regsitrate:</span> --}}
					<h4 style="margin-top: 0px;"><strong>Costo: </strong>$500.00</h4>
					<h5><strong>Pago en: </strong>Oxxo</h5>
					<div class="row">
						<a href="{{ route('auth.facebook') }}" class="btn col l12 waves-effect waves-light red darken-1"> Registrarme </a>
					</div>
					<p>El registro se hace con tu cuenta de facebook.</p>
				</div>
 			</div>
		</div>
		<div class="col l12">
			<div class="card blue darken-1 white-text">
				<div class="card-content">
					<h5><strong>Tema</strong></h5>
					<h6>{{ $event->subtitle }}</h6>
					<br>
					<h5><strong>Descripción</strong></h5>
					<div>
						{!! $event->description !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
