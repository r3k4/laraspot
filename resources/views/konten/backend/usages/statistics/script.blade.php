<script type="text/javascript">
Fungsi =  new Fungsi;

Highcharts.chart('container', {

    title: {
        text: 'Statistik Penggunaan Internet Bulan {{ fungsi()->bulan2(date("m")).' '.date("Y") }}'
    },

    // subtitle: {
    //     text: 'Source: thesolarfoundation.com'
    // },
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
                {{ $radacct->getDownloadByTgl(date('Y-m-').$i) }},
            @endfor
        ]
    },
     {
        name: 'Download',
        color : "#00612C",
        data: [
            @for($i=1;$i<=date('d');$i++)
                 {{ $radacct->getUploadByTgl(date('Y-m-').$i) }},  
            @endfor
        ]
    }]

});




</script>