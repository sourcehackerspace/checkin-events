@extends('layouts.app')

@section('content')
@locale()
<div class="container">
	<div class="row">
		@foreach ($events as $event)
			<div class="col s12 m6 l4" style="min-height: 100px;">
				<div class="card small card-event z-depth-4">
					<div class="card-image promoted" data-date="@shortdate($event->date)">
						{{-- <img src="http://lorempixel.com/640/480/city/" alt="{{ $event->slug }}"> --}}
						<img src="{{ asset('storage/'.$event->image) }}" class="img-responsive" alt="{{ $event->slug }}">
						
					</div>
					<div class="card-content">
						<p class="center-align"><strong>{{ $event->title }}</strong></p>
					</div>
					<div class="card-action">
						<a href="{{ route('events.register',['slug' => $event->slug]) }}" class="mylink">Ver más</a>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>
@endsection
