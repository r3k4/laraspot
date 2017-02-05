<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Radusergroup extends Model
{
    protected $table = 'radusergroup';
    public $incrementing = false;
    public $timestamps = false;    
    protected $primaryKey = 'username';

    protected $fillable = [
    	'username',
    	'groupname',
    	'priority'
    ];


    
}
