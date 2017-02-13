@extends('layouts.app')

@section('content')

<div class="container animated fadeIn">
    <div class="row">
        <div class="col-md-12 ">

            <div class="panel panel-default">
                <div class="panel-heading"> 
                    @include($base_view.'komponen.tombol_kick_all')
                    <h3>
                        <i class="fa fa-check-circle"></i> User Aktif
                    </h3> 
                </div>

                <div class="panel-body"> 

                <div id="profiles" class="col-md-12">
                    {{-- @include($base_view.'komponen.form_data')  --}}
                    Jml User Online : {!! count($radacct) !!}
                    <hr>
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


function kickAll(){
      
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
                    url : '{{ route("backend.user_aktif.kick_all") }}',
                    data : {kick : 1, _token : '{!! csrf_token() !!}' },
                    type : 'post',
                    error: function(err){
                        swal('error', 'terjadi kesalahan pada sisi server!', 'error');
                    },
                    success:function(ok){
                        swal({
                        title : "success!", 
                        text : "data telah diproses!", 
                        type : "success"
                        }, function(){
                            window.location.reload();
                        })
                    }
                })        
            }
        });
    
 
    

}


function kickUser(id)
{
 // console.log(id);

    swal({
        title : 'are you sure ?',
        type  : 'warning',
        closeOnCancel: true,
        showCancelButton: true,
        closeOnConfirm: false,
        showLoaderOnConfirm : true
        
    }, function(isConfirm){
        if(isConfirm){
            console.log(id);
            form_data = {
                radacctid : id, 
                _token : '{!! csrf_token() !!}'
            }

            $.ajax({
                url : '{{ route("backend.user_aktif.kick_user") }}',
                data : form_data,
                type : 'post',
                error: function(err){
                    swal('error', 'terjadi kesalahan pada sisi server!', 'error');
                },
                success:function(ok){
                    swal({
                    title : "success!", 
                    text : "data telah diproses!", 
                    type : "success"
                    }, function(){
                        window.location.reload();
                    })
                }
            })      
        }
    });

  
}
  
 

$(function () { $("[data-toggle='tooltip']").tooltip(); });

 
</script>

@endsection