<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Radacct;
use App\Services\Users\updateUserPasswordService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public $base_view = 'konten.backend.profile.';
    protected $radacct;

    public function __construct(Radacct $radacct)
    {
        $this->radacct = $radacct;
    	view()->share('backend_profile_home', true);
    	view()->share('base_view', $this->base_view);
    }

    public function index()
    {
        $jml_download =  $this->radacct->getMyDownloadUsagePackets();
        $jml_upload =  $this->radacct->getMyUploadUsagePackets();
    	return view($this->base_view.'index', compact('jml_upload', 'jml_download'));
    }

    public function update_profile(updateUserPasswordService $update)
    {
        return $update->handle();
    }

}
