<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class="text-center" width="10px">No.</th>
			<th>Nama Profile</th>
			<th width="100px" class="text-center">Jml User</th>
			<th class="text-center" width="100px">
				Action
			</th>
		</tr>
	</thead>
	<tbody>
	<?php $no= $profiles->firstItem(); ?>
		@foreach($profiles as $list)
		<tr>
			<td class="text-center">{!! $no !!}</td>
			<td>{!! $list->nama !!}</td>
			<td class="text-center">{!! count($list->radusergroup) !!}</td>
			<td class="text-center">
				@include($base_view.'action.manage_radgroupcheck')
				||
				@include($base_view.'action.manage_radgroupreply')
				||
				@include($base_view.'action.delete')
			</td>
		</tr>
		<?php $no++; ?>
		@endforeach
	</tbody>
</table>
{!! $profiles->render() !!}