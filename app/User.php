<?php

namespace App;

use App\Models\Mst\DataUser;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;
 
    protected $table = 'mst_users';

    protected $fillable = [
        'username', 'password', 'ref_user_level_id',
    ];

    protected $appends = [
        'fk__mst_data_user',      
    ];


    public function getFkMstDataUserAttribute()
    {
        $q = $this->mst_data_user;
        if(count($q)>0){
            return $q->nama;
        }
    }

    public function mst_data_user()
    {
        return $this->hasOne(DataUser::class, 'username', 'username');
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function findForPassport($username) {
            // return 'ok';
            \Log::info('username: '.$username);
        return $this->where('username', '=', $username)->first();
    }

}
