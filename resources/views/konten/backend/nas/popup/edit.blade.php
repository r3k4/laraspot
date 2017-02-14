<h3>
	<i class="fa fa-plus-square"></i> Add NAS Device
</h3>
<hr>

<div class="row">
	<div id="pesan"></div>
	<div class="col-md-6">
		
		<div class="form-group">
			{!! Form::label('nasname', "IP Address : ") !!}
			{!! Form::text('nasname', $nas->nasname, ['id' => 'nasname', 'class' => 'form-control', 'placeholder' => 'IP Address...']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('shortname', "Shortname : ") !!}
			{!! Form::text('shortname', $nas->shortname, ['id' => 'shortname', 'class' => 'form-control', 'placeholder' => 'Shortname...']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('ports', "Ports : ") !!}
			{!! Form::text('ports', $nas->ports, ['id' => 'ports', 'class' => 'form-control', 'placeholder' => 'Ports...']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('description', "Description : ") !!}
			{!! Form::text('description', $nas->description, ['id' => 'description', 'class' => 'form-control', 'placeholder' => 'Description...']) !!}
		</div>

	</div>
	<div class="col-md-6">

		<div class="form-group">
			{!! Form::label('secret', "Secret : ") !!}
			{!! Form::text('secret', $nas->secret, ['id' => 'secret', 'class' => 'form-control', 'placeholder' => 'Secret...']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('user_mikrotik', "Mikrotik Username : ") !!}
			{!! Form::text('user_mikrotik', $nas->user_mikrotik, ['id' => 'user_mikrotik', 'class' => 'form-control', 'placeholder' => 'Mikrotik Username...']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('password_mikrotik', "Password Mikrotik : ") !!}
			{!! Form::text('password_mikrotik', $nas->password_mikrotik, ['id' => 'password_mikrotik', 'class' => 'form-control', 'placeholder' => 'Password Mikrotik...']) !!}
		</div>

	</div>
	<div class="col-md-12">
		<hr>
		<button id='simpan' class='btn btn-info pull-right'><i class='fa fa-floppy-o'></i> SIMPAN</button>
	</div>


</div>



<script type="text/javascript">
$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');

form_data ={
	id : {{ $nas->id }},
	nasname : $('#nasname').val(),
	shortname : $('#shortname').val(),
	ports : $('#ports').val(),
	description : $('#description').val(),
	secret : $('#secret').val(),
	user_mikrotik : $('#user_mikrotik').val(),
	password_mikrotik : $('#password_mikrotik').val(),
 	_token : '{!! csrf_token() !!}'
}
$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("backend.nas.update") }}',
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
				 window.location.reload();
			 });
		}
	})
})



$('#pesan').click(function(){
	$('#pesan').fadeOut(function(){
		$('#pesan').html('').show().removeClass('alert alert-danger');
	});
})

</script>



