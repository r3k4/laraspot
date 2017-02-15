<table class="table text-danger" >

    	<tr>
    		<td class="alert-danger text-center" style="font-weight: bold;" colspan="3">
    			<i class="fa fa-list"></i> Most Active user
    		</td>
    	</tr>

        @foreach($radacct->getMostActiveUser() as $list)
        <tr>
            <td width="230px">
                <span data-toggle='tooltip' title='{!! $list->username !!}'>
                    {!! $list->nama !!}
                </span>
            </td>
            <td width="10px">:</td>
            <td>{!! fungsi()->size($list->jml) !!}</td>
        </tr>
    @endforeach
  
</table>