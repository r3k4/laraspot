<h3>
	<i class="fa fa-plus-square"></i> Tambah User Hotspot
</h3>
<hr>

<div class="row">
	<div id="pesan"></div>
	<div class="col-md-6">
		
		<div class="form-group">
			{!! Form::label('nama', 'Nama : ') !!}
			{!! Form::text('nama', '', ['id' => 'nama', 'placeholder' => 'nama', 'class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('username', 'Username : ') !!}
			{!! Form::text('username', '', ['id' => 'username', 'placeholder' => 'username', 'class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('password', 'Password : ') !!}
			{!! Form::password('password',  ['id' => 'password', 'placeholder' => 'password...', 'class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('password_confirmation', 're-enter Password : ') !!}
			{!! Form::password('password_confirmation',  ['id' => 'password_confirmation', 'placeholder' => 're-enter password...', 'class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('priority', 'Priority : ') !!}
			{!! Form::selectRange('priority', 1, 8, 8, ['id' => 'priority', 'class' => 'form-control']) !!}
		</div>

	</div>
	<div class="col-md-6">
		<div class="form-group">
			{!! Form::label('mst_profile_id', 'Profile : ') !!}
			{!! Form::select('mst_profile_id', $mst_profile, '', ['id' => 'mst_profile_id', 'class' => 'form-control', 'placeholder' => 'pilih profile']) !!}
		</div>		

		<div class="form-group">
			{!! Form::label('keterangan', 'Keterangan User : ') !!}
			{!! Form::textarea('keterangan', '', ['id' => 'keterangan', 'placeholder' => 'Keterangan User...', 'class' => 'form-control', 'style' => 'height:100px;']) !!}
		</div>		

	</div>
	<div class="col-md-12">
		<button id='simpan' class='btn btn-info pull-right'><i class='fa fa-floppy-o'></i> SIMPAN</button>
	</div>
</div>



<script type="text/javascript">
$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');

form_data ={
	nama : $('#nama').val(),
	username : $('#username').val(),
	mst_profile_id : $('#mst_profile_id').val(),
	keterangan : $('#keterangan').val(),
	password : $('#password').val(),
	priority : $('#priority').val(),
	password_confirmation : $('#password_confirmation').val(),
 	_token : '{!! csrf_token() !!}'
}
$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("backend.hotspot_users.insert") }}',
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


