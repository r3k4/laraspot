<h3> 
 <i class="fa fa-server"></i> Mikrotik Resource
</h3>

 
<hr> 
@foreach($results as  $list)


<table class="table table-bordered table-hover">
    <tr>
      <td>uptime</td>
      <td>{!! $list['uptime'] !!}</td>
    </tr>

    <tr>
      <td>CPU</td>
      <td>{!! $list['cpu'] !!}</td>
    </tr>


    <tr>
      <td>version</td>
      <td>{!! $list['version'] !!}</td>
    </tr>
 
    <tr>
      <td>free-memory</td>
      <td>{!! fungsi()->size($list['free-memory']) !!}</td>
    </tr>


    <tr>
      <td>total-memory</td>
      <td>{!! fungsi()->size($list['total-memory']) !!}</td>
    </tr>


    <tr>
      <td>cpu-count</td>
      <td>{!! $list['cpu-count'] !!} </td>
    </tr>


    <tr>
      <td>cpu-load</td>
      <td>{!! $list['cpu-load'] !!} </td>
    </tr>

    <tr>
      <td>board-name</td>
      <td>{!! $list['board-name'] !!} </td>
    </tr>

 </table>
 
 

@endforeach


 