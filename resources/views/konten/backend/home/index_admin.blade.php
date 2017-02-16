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
                        @include($base_view.'komponen_admin.load_statistik')
                        {{-- <h3>loading... <i class="fa fa-refresh fa-spin"></i> </h3> --}}
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
Fungsi =  new Fungsi;

Highcharts.chart('container', {

    title: {
        text: 'Statistik Penggunaan Internet Bulan {{ fungsi()->bulan2(date("m")).' '.date("Y") }}'
    },
    credits: false,

    xAxis: {
        categories: [
            @for($i=1;$i<=date('d');$i++)
                "{{ $i }}", 
            @endfor            
        ]
    },
    tooltip: {
        formatter: function() {
            return 'Tgl <b>' + this.x + ' {{ Fungsi()->bulan2(date("m")) }} </b> <br> '+this.series.name+': <b>'+Fungsi.size(this.y)+'</b>' ;
        }
    },    
    yAxis: {
        title: {
            text: 'Bandwidth Usage'
        }
    },
    legend: {      
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
 
    series: [{
        name: 'Upload',
        color : "#D53232",
        data: [
            @for($i=1;$i<=date('d');$i++)
                {{ $radacct->getGlobalDownloadByTgl(date('Y-m-').$i) }},
            @endfor
        ]
    },
     {
        name: 'Download',
        color : "#00612C",
        data: [
            @foreach($radacct->getDownloadThisMonth() as $index => $val)
                {{ $val }},
            @endforeach
            {{-- @for($i=1;$i<=date('d');$i++) --}}
                 {{-- {{ $radacct->getGlobalUploadByTgl(date('Y-m-').$i) }},   --}}
            {{-- @endfor --}}
        ]
    }]

}); 

</script>



<script type="text/javascript">
    $(document).ready(function(){
        // $('#bandwith_usage_this_month').load('{!! route("backend.home_statistik.index") !!}')
    });
</script>
@endsection