<ul class="mysidenav">
	<li>
		<div class="userView">
			<div class="background">
				<img src="{{ asset('img/background-panel.jpg') }}">
			</div>
			<span><img class="circle" src="http://lorempixel.com/800/800/sports/"></span>
			<span><span class="white-text name">{{ Auth::user()->name }}</span></span>
			<span><span class="white-text email">{{ Auth::user()->email }}</span></span>
		</div>
	</li>
	<li><a href="/home"><i class="fa fa-home fa-2x" aria-hidden="true"></i>Inicio</a></li>
	<li><a class="subheader"><i class="material-icons">today</i>Eventos</a></li>
	<li><div class="divider"></div></li>
	<li><a class="waves-effect" href="{{ route('crud.events.index') }}">Todos mis eventos</a></li>
	<li><a class="waves-effect" href="{{ route('crud.events.create') }}">Crear un evento</a></li>
	<li><div class="divider"></div></li>
	<li><a class="subheader"><i class="material-icons">perm_identity</i>Asistentes</a></li>
	<li><div class="divider"></div></li>
</ul>