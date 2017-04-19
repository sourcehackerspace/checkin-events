<footer class="page-footer">
	<div class="container">
		<div class="row">
			<div class="col l6 s12">
				<h5 class="white-text">Hashevent</h5>
				<p class="grey-text text-lighten-4">Encuentra tus eventos favoritos.</p>
			</div>
			<div class="col l4 offset-l2 s12">
				<h6 class="white-text">Mapa del Sitio</h6>
				<ul>
					<li><a class="grey-text text-lighten-3" href="{{ route('home') }}">Inicio</a></li>
					<li><a class="grey-text text-lighten-3" href="{{ route('events.list') }}">Eventos</a></li>
					<li><a class="grey-text text-lighten-3" href="{{ route('auth.login') }}">Entrar</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			© 2017 Powered by BlueBeanMX
			<a class="grey-text text-lighten-4 right" href="#!">Siguenos en Facebook</a>
		</div>
	</div>
</footer>