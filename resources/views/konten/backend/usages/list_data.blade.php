<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class="text-center" width="10px">No.</th>
			<th>IP Address</th>
			<th>MAC</th>
			<th>Start</th>
			<th>Stop</th>
			<th> <i class="fa fa-download"></i> download</th>
			<th><i class="fa fa-upload"></i> upload</th>
		</tr>
	</thead>
	<tbody>
	<?php $no=$usages->firstItem(); ?>
	@foreach($usages as $list)
		<tr>
			<td class="text-center">{!! $no !!}</td>
			<td>{!! $list->framedipaddress !!}</td>
			<td>{!! $list->callingstationid !!}</td>
			<td>
				{!! fungsi()->date_to_tgl(date('Y-m-d', strtotime($list->acctstarttime))) !!}
				- {!! date("H:i", strtotime($list->acctstarttime)) !!}
			</td>	
			<td>
			@if($list->acctstoptime == null)
				<span class="label label-info">
					masih aktif
				</span>
			@else
				{!! fungsi()->date_to_tgl(date('Y-m-d', strtotime($list->acctstoptime))) !!}
				- {!! date("H:i", strtotime($list->acctstoptime)) !!}
			@endif
			</td>
			<td>
				{!! fungsi()->size($list->acctoutputoctets) !!}
			</td>
			<td>
				{!! fungsi()->size($list->acctinputoctets) !!} 
			</td>
		</tr>
		<?php $no++; ?>
	@endforeach
	</tbody>
</table>

{!! $usages->render() !!}