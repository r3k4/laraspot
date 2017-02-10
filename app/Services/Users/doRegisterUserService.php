<?php 

namespace App\Services\Users;

use App\Models\Mst\DataUser;
use App\Models\Radcheck;
use App\Models\Radusergroup;
use Illuminate\Foundation\Validation\ValidatesRequests;

class doRegisterUserService 
{

	use ValidatesRequests;

	public function handle()
	{
        $this->validate(request(),[
            'username'  => 'required|unique:radcheck',
            'mst_profile_id'    => 'required',
            'password'      => 'required|confirmed'
        ]);

        // insert to radcheck
        $data_radcheck = [
            'username'  => request()->username,
            'attribute' => 'Cleartext-Password',
            'op'        => ':=',
            'value'     => request()->password
        ];
        Radcheck::create($data_radcheck);


        // insert to mst_users
        $create_dataUser = [
            'username'  => request()->username,
            'nama'  => request()->nama,
            'keterangan'    => request()->keterangan
        ];
        DataUser::create($create_dataUser);

        // insert ke group
        Radusergroup::create(['username' => request()->username, 'groupname' => request()->mst_profile_id, 'priority' => request()->priority]);


        return 'ok';		
	}

}