<div class="container">
	@if(session()->has('msg'))
	<div class="alert alert-dark" role="alert">
		{{session()->get('msg')}}
	</div>
	@endif
</div>