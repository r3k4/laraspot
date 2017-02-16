<table class="table text-info" >

    	<tr>
    		<td class="alert-info text-center" style="font-weight: bold;" colspan="3">
    			<i class="fa fa-list"></i> Most Online user
    		</td>
    	</tr>

        @foreach($radacct->getMostUserOnlineThisMonth() as $list)
        <tr>
            <td width="230px">
                <span data-toggle='tooltip' title='{!! $list->username !!}'>
                    {!! $list->fk__mst_data_user !!}
                </span>
            </td>
            <td width="10px">:</td>
            <td> 
                 {!! fungsi()->size($list->acctoutputoctets + $list->acctinputoctets) !!}
             </td>
        </tr>
    @endforeach
  
</table>