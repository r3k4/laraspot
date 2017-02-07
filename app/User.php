<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;
 
    protected $table = 'mst_users';

    protected $fillable = [
        'username', 'password', 'ref_user_level_id',
    ];

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
