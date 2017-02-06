
<button class='btn btn-primary pull-right' id='add'> <i class='fa fa-plus-square'></i> create</button>


<h3>
	Manage Groupcheck - {!! $profile->nama !!}
</h3>
<hr>

<hr>
<div class="row">
	<div class="col-md-12">
		

	<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th width="10px" class="text-center">No.</th>
					<th>Nama Atribut </th>
					<th>Operator</th>
					<th>Value</th>
					<th width="100px" class="text-center">
						Action
					</th>
				</tr>
			</thead>
			<tbody>
			<?php $no=1; ?>
			@foreach($profile->radgroupcheck as $list)
				<tr>
					<td class="text-center">{!! $no !!}</td>
					<td>{!! $list->attribute !!}</td>
					<td>{!! $list->op !!}</td>
					<td>{!! $list->value !!}</td>
					<td class="text-center">
						@include($base_view.'popup.action.edit_radgroupcheck')
						||
						@include($base_view.'popup.action.delete_radgroupcheck')
					</td>
				</tr>
				<?php $no++; ?>
			@endforeach
			</tbody>
		</table>


	</div>
</div>


<script type="text/javascript">
$('#add').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{{ route("backend.hotspot_profile.manage_radgroupcheck_create", $profile->id) }}');
})
</script>
