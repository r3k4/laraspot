<?php

namespace App\Models\Mst;

use App\Models\Radgroupreply;
use App\Models\Radusergroup;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'mst_profile';
    protected $fillable = [
    	'nama'
    ];


    public function radusergroup()
    {
    	return $this->hasMany(Radusergroup::class, 'groupname', 'nama');
    }

    public function radgroupreply()
    {
    	return $this->hasMany(Radgroupreply::class, 'groupname', 'nama');
    }


    public function getAll()
    {
    	return $this->orderBy('id', 'DESC')->paginate(10);
    }

}
