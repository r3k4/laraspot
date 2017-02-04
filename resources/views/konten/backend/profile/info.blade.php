<table class="table">
	<tr>
		<td width="200px">
			Username Hotspot
		</td>
		<td width="10px">
			: 
		</td>
		<td>
			{!! auth()->user()->username !!}
		</td>
	</tr>

	<tr>
		<td width="200px">
			Usage
		</td>
		<td width="10px">
			: 
		</td>
		<td>
			<span class="label label-info">
				<i class="fa fa-arrow-down"></i> {!! fungsi()->size($jml_download) !!}
			</span>
			
			<span class="label label-warning">
				<i class="fa fa-arrow-up"></i> {!! fungsi()->size($jml_upload) !!}
			</span>
			
		</td>
	</tr>


</table>