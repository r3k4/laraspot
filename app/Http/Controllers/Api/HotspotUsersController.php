<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Radcheck;
use Illuminate\Http\Request;

class HotspotUsersController extends Controller
{
    
    protected $radcheck;

    public function __construct(Radcheck $radcheck)
    {
    	$this->radcheck = $radcheck;
    }


    public function getAllUsers()
    {
    	$search = request()->get('search');
    	return $this->radcheck->getAll($search);
    }

    public function create()
    {
        return response(['error' => ['ok', 'sip']], 422);
        return 'ok';
    }


}
