<h3>
	Add Attribute Hotspot Profile - {!! $profile->nama !!}
</h3>
<hr>

<div class="row">
	<div class="col-md-12">
		<div id="pesan"></div>
		
		<div class="form-group">
			{!! Form::label('attribute', 'Attribute :') !!}
			{!! Form::text('attribute', '', ['id' => 'attribute', 'placeholder' => 'attribute profile...', 'class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('op', 'Op :') !!}
			{!! Form::text('op', '', ['id' => 'op', 'placeholder' => 'op profile...', 'class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('value', 'Value :') !!}
			{!! Form::text('value', '', ['id' => 'value', 'placeholder' => 'value profile...', 'class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			<button id='simpan' class='btn btn-info pull-right'><i class='fa fa-floppy-o'></i> SIMPAN</button>
			<button style="margin-right: 1em;" class="btn btn-default pull-right" id="cancel"> <i class="fa fa-arrow-left"></i> cancel</button>
		</div>

	</div>
</div>




<script type="text/javascript">
$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');

form_data ={
	groupname : "{!! $profile->nama !!}",
	attribute : $('#attribute').val(),
	op : $('#op').val(),
	value : $('#value').val(),
 	_token : '{!! csrf_token() !!}'
}
$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("backend.hotspot_profile.manage_radgroupcheck_insert") }}',
		data : form_data,
		type : 'post',
		error:function(xhr, status, error){
			$('#simpan').removeAttr('disabled');
		 	$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
	        datajson = JSON.parse(xhr.responseText);
	        $.each(datajson, function( index, value ) {
	       		$('#pesan').append(index + ": " + value+"<br>")
	          });
		},
		success:function(ok){
			 swal({
			 title : 'saved',
			 text : '-',
			 type : 'success'
			 }, function(){
			 	$('.modal-body').load('{!! route("backend.hotspot_profile.manage_radgroupcheck", $profile->id) !!}')
			 });
		}
	})
})



$('#pesan').click(function(){
	$('#pesan').fadeOut(function(){
		$('#pesan').html('').show().removeClass('alert alert-danger');
	});
})

$('#cancel').click(function(){
	$('.modal-body').load('{!! route("backend.hotspot_profile.manage_radgroupcheck", $profile->id) !!}')
});

</script>


