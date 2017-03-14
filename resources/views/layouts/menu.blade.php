<li><a href="{{ route('users.index') }}">Usuarios</a></li>
<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
		Cursos <span class="caret"></span>
	</a>

	<ul class="dropdown-menu" role="menu">
		<li>
			<a href="{{ route('crud.courses.index') }}"> Todos </a>
		</li>
		<li>
			<a href="{{ route('crud.courses.create') }}"> Crear </a>
		</li>
	</ul>
</li>
<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
		Tags <span class="caret"></span>
	</a>

	<ul class="dropdown-menu" role="menu">
		<li>
			<a href="#"> Todos </a>
		</li>
		<li>
			<a href="#"> Crear </a>
		</li>
	</ul>
</li>
<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
		{{ Auth::user()->name }} <span class="caret"></span>
	</a>

	<ul class="dropdown-menu" role="menu">
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
</li>