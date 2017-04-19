<div class="alert-box">
	@if (session('error'))
		<div id="card-alert" class="card red z-depth-4">
			<div class="card-content white-text">
				<p>{{ session('error') }}</p>
			</div>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
		</div>
	@endif
	@if (session('status'))
		<div id="card-alert" class="card light-blue">
			<div class="card-content white-text">
				<p>{{ session('status') }}</p>
			</div>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
		</div>
	@endif
</div>