<?php

namespace App\Models;

use App\Models\Radgroupreply;
use Illuminate\Database\Eloquent\Model;

class Radcheck extends Model
{
    protected $table = 'radcheck';
    public $incrementing = false;
    public $timestamps = false;


    protected $fillable = [
    	'username',
    	'attribute',
    	'op',
    	'value'
    ];

    /**
     * query scopes
     */
    
    public function scopeUsername($query, $username = null)
    {
    	if($username == null){
    		return $query->whereUsername(auth()->user()->username);
    	}
    	return $query->whereUsername($username);
    }

 
}
