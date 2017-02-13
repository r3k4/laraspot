@extends('layouts.app')

@section('content')

<div class="container animated fadeIn">
    <div class="row">
        <div class="col-md-12 ">

            <div class="panel panel-default">
                <div class="panel-heading"> 
                    @include($base_view.'komponen.tombol_action')
                    <h3>
                        <i class="fa fa-users"></i> Hotspot Users
                    </h3> 
                </div>

                <div class="panel-body"> 

                <div id="profiles" class="col-md-12">
                    @include($base_view.'komponen.form_data') 
                    @include($base_view.'list_data')                    
                </div>

                </div>
            </div>
        </div>
    </div>
 
</div>
 


@endsection




 
@section('custom_script')

<script type="text/javascript">




function deleteUser(id){
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
                url : '{{ route("backend.hotspot_users.delete") }}',
                data : {id : id, _token : '{!! csrf_token() !!}' },
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
                        window.location.reload();
                    })
                }
            })      
        }
    });    
}







$('#import').click(function(){
    $('#myModal').modal('show');
    $('.modal-body').load('{{ route("backend.hotspot_users.import") }}');
});

  
$('#add').click(function(){
    $('#myModal').modal('show');
    $('.modal-body').load('{{ route("backend.hotspot_users.create") }}');
});

$(function () { $("[data-toggle='tooltip']").tooltip(); });

    function view_credentials(id){
        $('.modal-body').html('loading... <i class="fa fa-spinner fa-spin"></i>');
        $('#myModal').modal('show');
        $('.modal-body').load('{{ route("backend.hotspot_users.view_credentials", null) }}/'+id)
    }


    
$('#myModal').on('hidden.bs.modal', function (e) {
    window.location.reload();
})

//     function manage_radgroupcheck(id){
//         $('.modal-body').html('loading... <i class="fa fa-spinner fa-spin"></i>');
//         $('#myModal').modal('show');
//         $('.modal-body').load('{{ route("backend.hotspot_profile.manage_radgroupcheck", null) }}/'+id)
//     }
</script>

@endsection