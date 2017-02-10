<h3>
	<i class="fa fa-address-book"></i> User Credentials
</h3>
<hr>
<div class="row">
	<div class="col-md-12">
		
	<table>
		<tr>
			<td width="200px">
				Username
			</td>
			<td width="10px">:</td>
			<td>{!! $radcheck->username !!}</td>
		</tr>

		<tr>
			<td>
				Nama
			</td>
			<td>:</td>
			<td>
			@if(count($radcheck->mst_data_user)>0)
				{!! $radcheck->mst_data_user->nama !!}
			@else
				-
			@endif
			</td>
		</tr>

		<tr>
			<td>
				Password
			</td>
			<td>:</td>
			<td>
			{!! $radcheck->value !!}
			</td>
		</tr>


	</table>

	</div>
</div>