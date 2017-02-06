<i class='fa fa-times' style='cursor:pointer;' id='del{{ $list->id }}'></i>

<script type="text/javascript">
$('#del{{ $list->id }}').click(function(){


	swal({
		title : 'are you sure ?',
		type  : 'warning',
		closeOnCancel: true,
		showCancelButton: true,
		closeOnConfirm: false,
		showLoaderOnConfirm : true
		
	}, function(isConfirm){
		if(isConfirm){
			$.ajax({
				url : '{{ route("backend.hotspot_profile.manage_radgroupcheck_delete") }}',
				data : {id : '{{ $list->id }}', _token : '{!! csrf_token() !!}' },
				type : 'post',
				error: function(err){
					swal('error', 'terjadi kesalahan pada sisi server!', 'error');
				},
				success:function(ok){
					swal({
					title : "success!", 
					text : "data telah terhapus!", 
					type : "success"
					}, function(){
						$('.modal-body').load('{!! route("backend.hotspot_profile.manage_radgroupcheck", $profile->id) !!}');
					})
				}
			})		
		}
	});





});
</script>


