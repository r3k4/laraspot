<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Jobs\importUsersJob;
use App\Models\Mst\DataUser;
use App\Models\Mst\Profile;
use App\Models\Radcheck;
use App\Models\Radusergroup;
use App\Services\Users\deleteUserService;
use App\Services\Users\doRegisterUserService;
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
    	// $hotspot_users = $this->radcheck->getAll(request()->get('search'));
        // return view($this->base_view.'index', compact('hotspot_users'));
        return view($this->base_view.'index_js', compact('hotspot_users'));
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
        $max = explode('M', ini_get('upload_max_filesize'));
        $max_upload = $max[0] * 1048576;            
        $mst_profile = $this->mst_profile->all()->pluck('nama', 'nama');
        return view($this->base_view.'popup.import', compact('mst_profile', 'max_upload'));
    }


    public function do_import()
    {

        $file = request()->file('file_import')->storeAs('users', 'users.xls');
        $lokasi_file = storage_path('app/users/users.xls');
        chmod($lokasi_file, 0777);        
        dispatch(new importUsersJob($lokasi_file, request()->mst_profile));

        return ['files' => request()->all() ];
    }


    public function delete(deleteUserService $delete)
    {
        return $delete->handle();
    }



}
