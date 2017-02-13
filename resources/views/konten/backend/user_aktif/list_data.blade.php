<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class="text-center" width="10px">No.</th>
			<th>Nama</th>
			<th>Username</th>
			<th>durasi</th>
			<th>penggunaan</th>
			<th class="text-center" width="100px">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; ?>
		@foreach($radacct as $list)
		<tr>
			<td class="text-center">{!! $no !!}</td>
			<td>
			@if(count($list->mst_data_user)>0)
				{!! $list->mst_data_user->nama !!}
			@else
				-
			@endif
			</td>
			<td>
			{!! $list->username !!}
			</td>
			<td>
			<?php
			// create($year = null, $month = null, $day = null, $hour = null, $minute = null, $second = null, $tz = null)
				$thn = date('Y', strtotime($list->acctstarttime));
				$bln = date('m', strtotime($list->acctstarttime));
				$tgl = date('m', strtotime($list->acctstarttime));
				$jam = date('H', strtotime($list->acctstarttime));
				$mnt = date('i', strtotime($list->acctstarttime));
				$dtk = date('s', strtotime($list->acctstarttime));
			 ?>
		    <span data-toggle='tooltip' title="{!! fungsi()->date_to_tgl(date('Y-m-d', strtotime($list->acctstarttime))).' '.date('H:i:s', strtotime($list->acctstarttime)) !!}">
		      {{ \Carbon\Carbon::create($thn, $bln, $tgl, $jam, $mnt, $dtk)->diffForHumans() }}
		    </span>
			</td>
			<td>
				{!! fungsi()->size((int)$list->acctinputoctets + (int)$list->acctoutputoctets) !!}
			</td>
			<td class="text-center">
			@include($base_view.'action.kick_user')
			{{-- <i class="fa fa-minus-circle"></i> --}}
			</td>
		</tr>
		<?php $no++; ?>
		@endforeach
	</tbody>
</table>