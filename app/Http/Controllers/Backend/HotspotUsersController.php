<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Mst\DataUser;
use App\Models\Mst\Profile;
use App\Models\Radcheck;
use App\Models\Radusergroup;
use Illuminate\Http\Request;

class HotspotUsersController extends Controller
{
    public $base_view = 'konten.backend.hotspot_users.';
    protected $radcheck;
    protected $mst_profile;

    public function __construct(Radcheck $radcheck, Profile $mst_profile)
    {
        $this->mst_profile = $mst_profile;
    	$this->radcheck = $radcheck;
    	view()->share('backend_hotspot_users_home', true);
    	view()->share('base_view', $this->base_view);
    }

    public function index()
    {
    	$hotspot_users = $this->radcheck->getAll(request()->get('search'));
    	return view($this->base_view.'index', compact('hotspot_users'));
    }

    public function create()
    {
        $mst_profile = $this->mst_profile->all()->pluck('nama', 'nama');
        return view($this->base_view.'popup.create', compact('mst_profile'));
    }

    public function insert(doRegisterUserService $register)
    {
        return $register->handle();
    }


    public function edit($id)
    {
        return 'ok';
    }

    public function view_credentials($id)
    {
        $radcheck = $this->radcheck->find($id);
        return view($this->base_view.'popup.view_credentials', compact('radcheck'));
    }


    public function import()
    {
        return view($this->base_view.'popup.import');
    }



}
