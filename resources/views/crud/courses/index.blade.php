@extends('layouts.admin')
@section('content')
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">Lista de Cursos</div>
			{{-- <div class="panel-body">
			</div> --}}
			<ul class="list-group">
				@foreach($courses as $course)
					<li class="list-group-item">{{ $course->name }}</li>
				@endforeach
			</ul>						
		</div>
	</div>
@endsection