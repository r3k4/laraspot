<?php

namespace App\Models\Mst;

use App\User;
use Illuminate\Database\Eloquent\Model;

class DataUser extends Model
{
    protected $table = 'mst_data_user';
    protected $fillable = [
    	'username',
    	'nama',
    	'keterangan'
    ];

    public function mst_user()
    {
    	return $this->belongsTo(User::class, 'username', 'username');
    }


    
}
