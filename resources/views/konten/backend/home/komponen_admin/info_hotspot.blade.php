<table class="table text-warning" style="font-size: 20px;">
	<tr>
		<td class="alert-warning text-center" style="font-weight: bold;" colspan="3">
			<i class="fa fa-list"></i> Info
		</td>
	</tr>
    <tr>
        <td width="190px">
            <i class="fa fa-user"></i> User Online
        </td>
        <td width="10px">:</td>
        <td>{!! count($radacct->getAllUserAktif()) !!}</td>
    </tr>
    <tr>
        <td>
            <i class="fa fa-users"></i> Total User
        </td>
        <td width="10px">:</td>
        <td>{!! $jml_total_user !!}</td>
    </tr>    
    <tr>
        <td>
            <i class="fa fa-server"></i> NAS Device
        </td>
        <td width="10px">:</td>
        <td>{!! $jml_nas !!}</td>
    </tr>    


</table>