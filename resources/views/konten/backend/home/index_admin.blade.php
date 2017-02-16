@extends('layouts.app')

@section('content')
 
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3> <i class="fa fa-home"></i> Dashboard</h3>
                </div>

                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-4">
                            @include($base_view.'komponen_admin.info_hotspot')
                        </div>  
                        <div class="col-md-4">
                            @include($base_view.'komponen_admin.top_user_online_today')
                        </div> 
                        <div class="col-md-4">
                            @include($base_view.'komponen_admin.top_active_user')
                        </div> 


                    </div>
                    <hr>


                    <div id="bandwith_usage_this_month">
                        <h3>loading... <i class="fa fa-refresh fa-spin"></i> </h3>
                    </div>
 
                <hr>
 

                 </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('custom_script')
<script type="text/javascript">
    $(document).ready(function(){
        $('#bandwith_usage_this_month').load('{!! route("backend.home_statistik.index") !!}')
    });
</script>
@endsection