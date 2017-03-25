@extends('layouts.app')

@section('content')
@locale()
	<div class="slider">
		<ul class="slides">
			<li>
				<img src="http://lorempixel.com/1366/768/nature/1"> <!-- random image -->
				<div class="caption center-align">
					<h3>This is our big Tagline!</h3>
					<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
				</div>
			</li>
			<li>
				<img src="http://lorempixel.com/1366/768/nature/2"> <!-- random image -->
				<div class="caption left-align">
					<h3>Left Aligned Caption</h3>
					<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
				</div>
			</li>
			<li>
				<img src="http://lorempixel.com/1366/768/nature/3"> <!-- random image -->
				<div class="caption right-align">
					<h3>Right Aligned Caption</h3>
					<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
				</div>
			</li>
			<li>
				<img src="http://lorempixel.com/1366/768/nature/4"> <!-- random image -->
				<div class="caption center-align">
					<h3>This is our big Tagline!</h3>
					<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
				</div>
			</li>
		</ul>
	</div>
	<div class="container">
		<div class="row">
			<div class="col l4 center">
				<h3>titulo</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, repellendus, autem! Sunt, neque! Vel tenetur perferendis commodi incidunt itaque amet omnis explicabo tempora non dignissimos in, laboriosam voluptatem, earum tempore.</p>
			</div>
			<div class="col l4 center">
				<h3>titulo</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime optio, pariatur tempora sit perferendis, atque cupiditate ipsam aut alias culpa magni debitis saepe ea? Nobis, voluptatibus porro numquam explicabo voluptates?</p>
			</div>
			<div class="col l4 center">
				<h3>titulo</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, fugit, voluptas. Deleniti dolor perferendis itaque veniam optio ea a quam asperiores! Magnam ut, quae quaerat neque. Dolorem iure porro ullam.</p>
			</div>
		</div>
	</div>
	<section class="accent white-text" style="padding: 20px;">
		<div class="container">
			<div class="row" style="margin-bottom: 0px;">
				<div class="col m6 l8">
					<img src="http://lorempixel.com/1200/480/nature" class="responsive-img" alt="">
				</div>
				<div class="col m6 l4">
					<h4>Titulo</h4>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae rerum porro, voluptatem consequuntur illo, incidunt culpa eaque expedita laudantium? Corporis aspernatur id magni maxime officia. Facere dolorum, quod quos aperiam!
				</div>
			</div>
		</div>
	</section>
	<section style="padding: 20px; height: 240px;">
		<div class="container">
			<div class="row valign-wrapper">
				<div class="col l8">
					<h4>Suscribete</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem odio, saepe, deserunt culpa temporibus minima, praesentium laboriosam itaque aspernatur quasi magnam non. Eligendi alias, officia a aliquam. Sint, nobis quis.</p>
				</div>
				<div class="col l4">
					<form action="" class="valing">
						<div class="input-field">
							<input type="text">
							<label for="">Dejanos tu correo tu correo.</label>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
@endsection
@section('js')
	<script>
		$(document).ready(function(){
			$('.slider').slider();
		});
	</script>
@endsection
