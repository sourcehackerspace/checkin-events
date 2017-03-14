@if (session('error'))
	<div class="alert-content">
		<div class="alert alert-warning alert-dismissible fade in" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			{{ session('error') }}
		</div>
	</div>
@endif
@if (session('status'))
	<div class="alert-content">
		<div class="alert alert-info alert-dismissible fade in" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			{{ session('status') }}
		</div>
	</div>
@endif