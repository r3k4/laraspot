<div class="container">
	<div class="col-md-12">
		@if(session()->has('pesan'))
			<div class="alert alert-info animated fadeIn">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				{!! session('pesan') !!}				
			</div>
		@endif
		
		@if(session()->has('pesan_error'))
			<div class="alert alert-danger animated fadeIn">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				{!! session('pesan_error') !!}				
			</div>
		@endif

	</div>
</div>
 