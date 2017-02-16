<table class="table text-danger" >

    	<tr>
    		<td class="alert-danger text-center" style="font-weight: bold;" colspan="3">
    			<i class="fa fa-list"></i> Most Active user this month
    		</td>
    	</tr>

        @foreach($radacct->getMostActiveUserThisMonth() as $list)
        <tr>
            <td width="230px">
                <span data-toggle='tooltip' title='{!! $list->username !!}'>
                    {!! $list->fk__mst_data_user !!}
                </span>
            </td>
            <td width="10px">:</td>
            <td>{!! fungsi()->size($list->jml) !!}</td>
        </tr>
    @endforeach
  
</table>