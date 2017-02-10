<?php 

namespace App\Services\Users;

use App\Jobs\Users\doKickUserHotspotJob;
use App\Models\Nas;
use App\Models\Radacct;

class doKickUserService 
{


	public function handle()
	{
		$radacct = Radacct::where('radacctid', '=', request()->radacctid)->first();
		if(count($radacct)>0){
			$username = $radacct->username;
			$ip = $radacct->framedipaddress;
			$nas_ip = $radacct->nasipaddress;
			$get_nas_data = Nas::where('nasname', '=', $nas_ip)->first();
			$nas_secret = $get_nas_data->secret;
			dispatch(new doKickUserHotspotJob($username, $ip, $nas_ip, $nas_secret));
		}else{
			\Log::info('gagal...'.json_encode($radacct).'_'.request()->all());
		}
		return 'ok';
	}

}