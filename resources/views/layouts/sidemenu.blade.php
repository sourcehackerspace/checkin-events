<ul class="mysidenav">
	<li>
		<div class="userView">
			<div class="background">
				<img src="{{ asset('img/background-panel.jpg') }}">
			</div>
			<span>
				@if(Auth::user()->isUser)
					<img class="circle" src="https://graph.facebook.com/v2.8/{{ Auth::user()->social_id }}/picture?width=1920">
				@else
					<img class="circle" src="{{ asset('img/admin.png') }}">
				@endif
			</span>
			<span><span class="white-text name">{{ Auth::user()->name }}</span></span>
			<span><span class="white-text email">{{ Auth::user()->email }}</span></span>
		</div>
	</li>
	@if(Auth::user()->isAdmin)
		<li><a class="subheader"><i class="material-icons">today</i>Eventos</a></li>
		<li><div class="divider"></div></li>
		<li><a class="waves-effect" href="{{ route('crud.events.index') }}">Todos mis eventos</a></li>
		<li><a class="waves-effect" href="{{ route('crud.events.create') }}">Crear un evento</a></li>
		<li><div class="divider"></div></li>
		<li><a class="subheader"><i class="material-icons">perm_identity</i>Asistentes</a></li>
		<li><div class="divider"></div></li>
	@elseif(Auth::user()->isUser)
		<li><a class="subheader"><i class="material-icons">today</i>Eventos</a></li>
		<li><div class="divider"></div></li>
		<li><a class="waves-effect" href="{{ route('account.index') }}">Proximos</a></li>
		<li><a class="waves-effect" href="{{ route('account.last') }}">Pasados</a></li>
	@endif
</ul>