@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		@foreach ($courses as $course)
			<div class="col s12 m6 l4" style="min-height: 100px;">
				<div class="card">
					<div class="card-image">
						<img src="http://lorempixel.com/640/480/city/" alt="{{ $course->slug }}">
						<span class="card-title">{{ $course->topic }}</span>
						<a href="#" class="btn-floating btn-large halfway-fab waves-effect waves-light red hoverable"><i class="material-icons">add</i></a>
					</div>
					<div class="card-content">
						<p>{{ $course->name }}</p>
					</div>
					<div class="card-action">
						<a href="{{ route('courses.register',['slug' => $course->slug]) }}">Registrarme</a>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>
@endsection
