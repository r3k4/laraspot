<?php

namespace App\Models;

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

    public function getMyDownloadUsagePackets()
    {
    	return $this->username()->sum('acctinputoctets');
    }

    public function getMyUploadUsagePackets()
    {
    	return $this->username()->sum('acctoutputoctets');
    }


}
