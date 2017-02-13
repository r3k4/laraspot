<?php

namespace App\Models;

use App\Models\Mst\DataUser;
use Illuminate\Database\Eloquent\Model;

class Radacct extends Model
{
    protected $table = 'radacct';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
    	'radacctid', //ID
    	'acctsessionid',
    	'acctuniqueid',
    	'username',
    	'groupname',
    	'realm',
    	'nasipaddress',
    	'nasportid',
    	'nasporttype',
    	'acctstarttime',
    	'acctstoptime',
    	'acctsessiontime',
    	'acctauthentic',
    	'connectinfo_start',
    	'connectinfo_stop',
    	'acctinputoctets',
    	'acctoutputoctets',
    	'calledstationid',
    	'callingstationid',
    	'acctterminatecause',
    	'servicetype',
    	'framedprotocol',
    	'framedipaddress',
    	'acctstartdelay',
    	'acctstopdelay',
    	'xascendsessionsvrkey'
    ];




    /**
     * query scopes
     */
    public function scopeUsername($query)
    {
    	return $query->where('username', '=', auth()->user()->username);
    }

    public function scopeOrder($query)
    {
        return $query->orderBy('radacctid', 'DESC');
    }



    public function mst_data_user()
    {
        return $this->belongsTo(DataUser::class, 'username', 'username');
    }


    /**
     * custom query
     */

    public function getMyDownloadUsagePackets()
    {
    	return $this->username()->sum('acctoutputoctets');
    }

    public function getMyUploadUsagePackets()
    {
    	return $this->username()->sum('acctinputoctets');
    }

    public function getAllUsages()
    {
        return $this->username()->order()->paginate(10);
    }


    public function userUsageDownload($username)
    {
        return $this->where('username', '=', $username)->sum('acctoutputoctets');
    }

    public function userUsageUpload($username)
    {
        return $this->where('username', '=', $username)->sum('acctinputoctets');
    }

    public function userUsageTotal($username)
    {
        $down = $this->userUsageDownload($username);
        $up = $this->userUsageUpload($username);
        return (int) $down + (int) $up;
    }


    public function getAllUserAktif()
    {
        return $this->where('acctstoptime', '=', null)->get();
    }


}
