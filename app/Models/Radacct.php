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

    public function getMostUserOnline()
    {
        return $this->select(\DB::raw('radacct.*, mst_data_user.nama, mst_data_user.username'))
                    ->where('acctstoptime', '=', null)
                    ->leftJoin('mst_data_user', 'mst_data_user.username', '=', 'radacct.username')
                    ->orderBy('acctoutputoctets', 'DESC')
                    ->take(4)
                    ->get();
    }

    public function getMostActiveUser()
    {
        return $this->select(\DB::raw('radacct.username, mst_data_user.nama, sum(acctoutputoctets) as jml'))
                    ->leftJoin('mst_data_user', 'mst_data_user.username', '=', 'radacct.username')
                    ->orderBy('acctoutputoctets', 'DESC')
                    ->groupBy('mst_data_user.username')
                    ->take(4)
                    ->get();        
    }


    public function getDownloadByTgl($tgl)
    {
        return $this->whereUsername(auth()->user()->username)
                    ->whereDate('acctstarttime', '=', $tgl)->sum('acctinputoctets');
    }

    public function getUploadByTgl($tgl)
    {
        return $this->whereUsername(auth()->user()->username)
                    ->whereDate('acctstarttime', '=', $tgl)->sum('acctoutputoctets');
    }


    public function getGlobalDownloadByTgl($tgl)
    {
        return $this->whereDate('acctstarttime', '=', $tgl)->sum('acctinputoctets');
    }

    public function getGlobalUploadByTgl($tgl)
    {
        return $this->whereDate('acctstarttime', '=', $tgl)->sum('acctoutputoctets');
    }


}
