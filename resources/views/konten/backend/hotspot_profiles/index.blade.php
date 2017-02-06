@extends('layouts.app')

@section('content')
<div class="container animated fadeIn">
    <div class="row">
        <div class="col-md-12 ">


            <div class="panel panel-default">
                <div class="panel-heading"> 
                    @include($base_view.'komponen.tombol_add')
                    <h3>
                        <i class="fa fa-list"></i> Hotspot Profiles
                    </h3> 
                </div>

                <div class="panel-body"> 

                <div class="col-md-8">
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
$('#add').click(function(){
    $('#myModal').modal('show');
    $('.modal-body').load('{{ route("backend.hotspot_profile.create") }}');
});

$(function () { $("[data-toggle='tooltip']").tooltip(); });

    function manage_radgroupreply(id){
        $('.modal-body').html('loading... <i class="fa fa-spinner fa-spin"></i>');
        $('#myModal').modal('show');
        $('.modal-body').load('{{ route("backend.hotspot_profile.manage_radgroupreply", null) }}/'+id)
    }


    function manage_radgroupcheck(id){
        $('.modal-body').html('loading... <i class="fa fa-spinner fa-spin"></i>');
        $('#myModal').modal('show');
        $('.modal-body').load('{{ route("backend.hotspot_profile.manage_radgroupcheck", null) }}/'+id)
    }
</script>

@endsection