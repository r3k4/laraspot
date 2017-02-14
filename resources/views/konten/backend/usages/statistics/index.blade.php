@extends('layouts.app')

@section('content')


<script src="/bower_components/highcharts/highcharts.js"></script>
<script src="/bower_components/highcharts/modules/exporting.js"></script>


<div class="container animated fadeIn">
    <div class="row">
        <div class="col-md-12 ">

        
            <div class="panel panel-default">
                <div class="panel-heading"> 
                    <h3>
                        <i class="fa fa-th-list"></i> Statistics
                    </h3> 
                </div>

                <div class="panel-body"> 
                    @include($base_view.'komponen.nav_atas')


                    <div id="container"></div>

                    

                </div>
            </div>
        </div>
    </div> 
</div>
 


@endsection

@section('custom_script')
    @include($base_view.'statistics.script')
@endsection
 