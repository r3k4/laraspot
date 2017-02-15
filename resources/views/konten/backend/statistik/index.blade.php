@extends('layouts.app')

@section('content')
<script src="/bower_components/highcharts/highcharts.js"></script>
<script src="/bower_components/highcharts/modules/exporting.js"></script>


<div class="container animated fadeIn">
    <div class="row">
        <div class="col-md-12">


            <div class="panel panel-default">
                <div class="panel-heading"> 
                    <h3>
                        <i class="fa fa-bar-chart"></i> Statistik
                    </h3> 
                </div>

                <div class="panel-body"> 

                    <div id="container"></div>

                    {{-- @include($base_view.'info') --}}
                    <hr>         

                    {{-- @include($base_view.'form_data')  --}}

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
            @for($i=1;$i<=date('d');$i++)
                 {{ $radacct->getGlobalUploadByTgl(date('Y-m-').$i) }},  
            @endfor
        ]
    }]

});




</script>
@endsection