<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Jobs\Users\doKickUserHotspotJob;
use App\Models\Radacct;
use App\Services\Users\doKickUserService;
use Illuminate\Http\Request;

class UserAktifController extends Controller
{
    public $base_view = 'konten.backend.user_aktif.';
    protected $radacct;

    public function __construct(Radacct $radacct)
    {
    	$this->radacct = $radacct;
    	view()->share('backend_user_aktif_home', true);
    	view()->share('base_view', $this->base_view);
    }


    public function index()
    {
    	\Carbon\Carbon::setLocale('id');
    	$radacct = $this->radacct->getAllUserAktif();
    	return view($this->base_view.'index', compact('radacct'));
    }


    public function kick_user()
    {
       dispatch(new doKickUserHotspotJob(request()->radacctid));
    }

    public function kick_all()
    {
        $user_aktif = $this->radacct->getAllUserAktif();
        foreach($user_aktif as $list){
            dispatch(new doKickUserHotspotJob($list->radacctid));
        }
    }


}
