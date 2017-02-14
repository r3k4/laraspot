@extends('layouts.app')

@section('content')

 

<div class="container animated fadeIn">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">


            <div class="panel panel-default">
                <div class="panel-heading"> 
                    @include($base_view.'komponen.tombol_add')
                    <h3>
                        <i class="fa fa-server"></i> NAS Device(s)
                    </h3> 
                </div>

                <div class="panel-body"> 

                    @include($base_view.'list_data')

                </div>
            </div>
        </div>
    </div>
 
</div>
 


@endsection


@section('custom_script')

<script type="text/javascript">
    function createNas()
    {
        $('#myModal').modal('show');
        $('.modal-body').load('{!! route("backend.nas.create") !!}');
    }

    function editNas(id)
    {
        $('#myModal').modal('show');
        $('.modal-body').load('{!! route("backend.nas.edit", null) !!}/'+id);        
    }

 
    function delNas(id){   
    
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
                    url : '{{ route("backend.nas.delete") }}',
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
 
    
    function viewResource(id)
    {
        $('#myModal').modal('show');
        $('.modal-body').load('{!! route("backend.nas.view_resource", null) !!}/'+id);
    }    
 $(function () { $("[data-toggle='tooltip']").tooltip(); });    

</script>
@endsection
 