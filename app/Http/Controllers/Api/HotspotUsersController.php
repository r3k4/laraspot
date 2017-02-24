<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Radacct;
use App\Models\Radcheck;
use Illuminate\Http\Request;

class HotspotUsersController extends Controller
{
    
    protected $radcheck;
    protected $radacct;

    public function __construct(Radcheck $radcheck, Radacct $radacct)
    {
        $this->radacct = $radacct;
    	$this->radcheck = $radcheck;
    }


    public function getAllUsers()
    {
    	$search = request()->get('search');
    	return $this->radcheck->getAll($search);
    }

    public function find($id)
    {
        return $this->radcheck->find($id);        
    }

    public function findBy($username)
    {
        return $this->radcheck->whereUsername($username)->first();        
    }

    public function create()
    {
        return response(['error' => ['ok', 'sip']], 422);
        return 'ok';
    }

    public function getMostActiveUserThisMonth()
    {
        return $this->radacct->getMostActiveUserThisMonth();
    }


    public function getMostUserOnlineThisMonth()
    {
        return $this->radacct->getMostUserOnlineThisMonth();
    }


}
