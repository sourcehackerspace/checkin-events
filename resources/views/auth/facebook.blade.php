@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Tu curso</div>
				<div class="panel-body">
					<div>
						<img src="{{ $course->image }}" class="img-responsive" alt="{{ $course->slug }}">
						<h2 class="text-center">{{ $course->name }}</h2>
						<h3 class="text-center">{{ $course->topic }}</h3>
						<p class="text-justify">{{ $course->description }}</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">Registrate</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-offset-1 col-md-10">
							<p class="text-justify">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia omnis, nulla corporis, autem quidem ratione obcaecati accusamus, soluta nobis distinctio ab minima atque aspernatur suscipit, odio deserunt odit. Illo, hic.
							</p>
						</div>
						<div class="col-md-offset-1 col-md-10">
							<a href="{{ route('auth.facebook') }}" class="btn btn-primary btn-lg">
								Registrate con Facebook
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
