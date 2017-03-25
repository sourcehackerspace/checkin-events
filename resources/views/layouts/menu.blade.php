<li><a href="{{ route('users.index') }}">Usuarios</a></li>

<li><a class="dropdown-button" href="#!" data-activates="dropcourses">Eventos<i class="material-icons right">arrow_drop_down</i></a></li>
<ul id="dropcourses" class="dropdown-content">
	<li>
		<a href="{{ route('crud.events.index') }}"> Todos </a>
	</li>
	<li>
		<a href="{{ route('crud.events.create') }}"> Crear </a>
	</li>
</ul>

<li><a class="dropdown-button" href="#!" data-activates="droptags">Tags<i class="material-icons right">arrow_drop_down</i></a></li>
<ul id="droptags" class="dropdown-content">
	<li>
		<a href="#!"> Todos </a>
	</li>
	<li>
		<a href="#!"> Crear </a>
	</li>
</ul>

<li><a class="dropdown-button" href="#!" data-activates="dropuser">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
<ul id="dropuser" class="dropdown-content">
	<li>
		<a href="{{ route('auth.logout') }}"
			onclick="event.preventDefault();
					 document.getElementById('logout-form').submit();">
			Logout
		</a>

		<form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
			{{ csrf_field() }}
		</form>
	</li>
</ul>