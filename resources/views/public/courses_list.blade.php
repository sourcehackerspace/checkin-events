@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Cursos</div>
				<div class="panel-body">
					<div class="row">
						@foreach ($courses as $course)
							<div class="col-md-4" style="min-height: 300px;">
								<img src="{{ $course->image }}" class="img-responsive" alt="{{ $course->slug }}">
								<h4 class="text-center">{{ $course->name }}</h4>
								<h5 class="text-center">{{ $course->topic }}</h5>
								<a class="btn btn-primary" href="{{ route('courses.register',['slug' => $course->slug]) }}">Registrarme</a>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
