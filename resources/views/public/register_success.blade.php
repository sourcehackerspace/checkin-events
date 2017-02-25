@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				{{-- <div class="panel-heading">Cursos</div> --}}
				<div class="panel-body">
					<div class="row">
						<h1 class="text-center">Muchas Gracias, ya estas registrado al curso.</h1>
						<h2 class="text-center">{{ $course->name }}</h2>
						<h3 class="text-center">Te hemos enviado un correo con toda la información.</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
