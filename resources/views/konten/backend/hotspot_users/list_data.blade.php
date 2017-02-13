<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class="text-center" width="10px">No.</th>
			<th>Nama</th>
			<th>Username</th>
			<th>Profile</th>
			<th>Usages</th>			
			<th class="text-center" width="100px">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php $no = $hotspot_users->firstItem(); ?>
		@foreach($hotspot_users as $list)
		<tr>
			<td class="text-center">{!! $no !!}</td>
			<td>{!! $list->nama !!}</td>
			<td>{!! $list->username !!}</td>
			<td>{!! $list->fk__radusergroup !!}</td>
			<td>{!! fungsi()->size($list->c__total_usage) !!}</td>
			<td class="text-center">
				@include($base_view.'action.view_credentials')
				||
				@include($base_view.'action.delete')
			</td>
		</tr>
		<?php $no++; ?>
		@endforeach
	</tbody>
</table>

{!! $hotspot_users->appends(request()->all)->render() !!}