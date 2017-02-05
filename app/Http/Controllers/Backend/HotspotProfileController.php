<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Mst\Profile;
use Illuminate\Http\Request;

class HotspotProfileController extends Controller
{
    public $base_view = 'konten.backend.hotspot_profiles.';
    protected $mst_profile;

    public function __construct(Profile $mst_profile)
    {
    	$this->mst_profile = $mst_profile;
    	view()->share('backend_hotspot_profile_home', true);
    	view()->share('base_view', $this->base_view);
    }

    public function index()
    {
    	$profiles = $this->mst_profile->getAll();
    	return view($this->base_view.'index', compact('profiles'));
    }



}
