<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class="text-center" width="10px">No.</th>
			<th>IP NAS</th>
			<th>Name</th>
			<th>Ports</th>
			<th>Description</th>
			<th class="text-center" width="100px">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = $nas->firstItem(); ?>
		@foreach($nas as $list)
		<tr>
			<td>{!! $no !!}</td>
			<td>{!! $list->nasname !!}</td>
			<td>{!! $list->shortname !!}</td>
			<td>{!! $list->ports !!}</td>
			<td>{!! $list->description !!}</td>
			<td class="text-center">
				<i data-toggle='tooltip' title="Resources" class="fa fa-code-fork" style="cursor: pointer;" onClick="viewResource({{ $list->id }})"></i>
				||
				<i class="fa fa-pencil-square" style="cursor: pointer;" onClick="editNas({!! $list->id !!})"></i>
				||
				<i class="fa fa-times" style="cursor: pointer;" onClick="delNas({!! $list->id !!})"></i>
			</td>
		</tr>
		<?php $no++; ?>
		@endforeach
	</tbody>
</table>

{!! $nas->render() !!}