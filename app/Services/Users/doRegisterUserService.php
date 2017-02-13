<?php 

namespace App\Services\Users;

use App\Models\Mst\DataUser;
use App\Models\Radcheck;
use App\Models\Radusergroup;
use App\User;
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

        $this->insertDataUser(request()->username, 
                              request()->password, 
                              request()->mst_profile_id,
                              request()->nama,
                              request()->priority,
                              request()->keterangan
                            );

        return 'ok';
	}


    public function insertDataUser($username, $password, $groupname, $nama, $priority = 8, $keterangan = '')
    {
        // insert to radcheck
        $data_radcheck = [
            'username'  => $username,
            'attribute' => 'Cleartext-Password',
            'op'        => ':=',
            'value'     => $password
        ];
        Radcheck::create($data_radcheck);


        // insert to mst_data_user
        $create_dataUser = [
            'username'  => $username,
            'nama'  => $nama,
            'keterangan'    => $keterangan
        ];
        DataUser::create($create_dataUser);


        $insert_mst_user = [
            'username'  => $username,
            'password'  => bcrypt($password),
            'ref_user_level_id' => 2
        ];

        User::create($insert_mst_user);


        // insert ke group
        Radusergroup::create(['username' => $username, 'groupname' => $groupname, 'priority' => $priority]);

    }

}