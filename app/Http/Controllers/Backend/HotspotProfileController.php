<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Mst\Profile;
use App\Models\Radgroupreply;
use Illuminate\Http\Request;

class HotspotProfileController extends Controller
{
    public $base_view = 'konten.backend.hotspot_profiles.';
    protected $mst_profile;
    protected $radgroupreply;

    public function __construct(Profile $mst_profile, Radgroupreply $radgroupreply)
    {
    	$this->radgroupreply = $radgroupreply;
    	$this->mst_profile = $mst_profile;
    	view()->share('backend_hotspot_profile_home', true);
    	view()->share('base_view', $this->base_view);
    }

    public function index()
    {
    	$profiles = $this->mst_profile->getAll();
    	return view($this->base_view.'index', compact('profiles'));
    }

    public function create()
    {
    	return view($this->base_view.'popup.create');
    }

    public function insert()
    {
    	$this->validate(request(),[
    		'nama'	=> 'required|alpha'
    	]);
    	return $this->mst_profile->create(request()->except('_token'));
    }

    public function manage_radgroupreply($mst_profile_id)
    {
    	$profile = $this->mst_profile->find($mst_profile_id);
    	return view($this->base_view.'popup.manage_radgroupreply', compact('profile'));
    }

    public function manage_radgroupreply_create($mst_profile_id)
    {
    	$profile = $this->mst_profile->find($mst_profile_id);
    	return view($this->base_view.'popup.manage_radgroupreply_create', compact('profile'));
    }    

    public function manage_radgroupreply_insert()
    {
    	$this->validate(request(),[
    		'attribute' 	=> 'required',
    		'op'			=> 'required',
    		'value'			=> 'required'
    	]);

    	// return $this->mst_profile->
    }    

}
