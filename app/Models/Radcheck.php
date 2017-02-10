<?php

namespace App\Models;

use App\Models\Mst\DataUser;
use App\Models\Radacct;
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

    protected $appends = [
        'c__total_usage',
        'c__upload_usage',
        'c__download_usage'
    ];
 
    public function getCDownloadUsageAttribute()
    {
        $r = new Radacct;
        $username = $this->attributes['username'];
        return (int) $r->userUsageDownload($username);
    }

    public function getCUploadUsageAttribute()
    {
        $r = new Radacct;
        $username = $this->attributes['username'];
        return (int) $r->userUsageUpload($username);
    }

    public function getCTotalUsageAttribute()
    {
        $r = new Radacct;
        $username = $this->attributes['username'];
        return (int) $r->userUsageTotal($username);
    }




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

    public function scopeJoinDataUser($query)
    {
        return $query->select(\DB::raw('mst_data_user.nama, radcheck.*'))
                     ->leftJoin('mst_data_user', 'mst_data_user.username', '=', 'radcheck.username');
    }

    public function scopeOrder($query)
    {
        return $query->orderBy('radcheck.id', 'DESC');
    }

    public function scopeCari($query, $search_value)
    {
        return $query->where('radcheck.username', 'like', '%'.$search_value.'%')
                     ->orWhere('mst_data_user.nama', 'like', '%'.$search_value.'%');
    }

 

    public function mst_data_user()
    {
        return $this->hasOne(DataUser::class, 'username', 'username');
    }



    /**
     * custom query
     */


    public function getAll($search)
    {
        if($search){
            return $this->joinDataUser()->cari($search)->order()->paginate(10);
        }
        return $this->joinDataUser()->order()->paginate(10);    
    }


}
