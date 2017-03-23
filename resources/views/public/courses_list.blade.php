@extends('layouts.app')

@section('content')
@locale()
<div class="container">
	<div class="row">
		@foreach ($courses as $course)
			<div class="col s12 m6 l4" style="min-height: 100px;">
				<div class="card">
					<div class="card-image">
						<img src="http://lorempixel.com/640/480/city/" alt="{{ $course->slug }}">
						{{-- <img src="{{ asset('storage/'.$course->image) }}" class="img-responsive" alt="{{ $course->slug }}"> --}}
						<div class="card-title back-shadow">
							<span>{{ $course->title }}</span>
						</div>
						{{-- <a href="#" class="btn-floating btn-large halfway-fab waves-effect waves-light red hoverable"><i class="material-icons">add</i></a> --}}
					</div>
					<div class="card-content">
						<p>@date($course->date.'')</p>
					</div>
					<div class="card-action" style="background-color: #233945;">
						<a href="{{ route('courses.register',['slug' => $course->slug]) }}" class="mylink">Ver más</a>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>
@endsection
