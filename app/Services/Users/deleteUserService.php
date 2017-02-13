<?php 

namespace App\Services\Users;

use App\Models\Radcheck;
use App\Models\Radusergroup;
use App\User;

class deleteUserService 
{

	protected $radcheck;
	protected $mst_users;
	protected $radusergroup;

	public function __construct(User $mst_users, 
								Radcheck $radcheck, 
								Radusergroup $radusergroup
							){
		$this->radusergroup = $radusergroup;
		$this->radcheck = $radcheck;
		$this->mst_users = $mst_users;
	}

	public function handle()
	{
 		$radcheck = $this->radcheck->find(request()->id);
 		if(count($radcheck)>0){
	 		// del mst_users 
	 		$u = $this->mst_users->whereUsername($radcheck->username)->first();
	 		if(count($u)>0){
		 		$u->delete();	 			
	 		}

	 		// del radusergroup
	 		$rg = $this->radusergroup->whereUsername($radcheck->username)->get();
	 		foreach($rg as $list){
	 			$list->delete();
	 		}

	 		$radcheck->delete();
 		}
 		return 'ok';
	}


}