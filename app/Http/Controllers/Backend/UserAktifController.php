<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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
    	$radacct = $this->radacct->where('acctstoptime', '=', null)->get();
    	return view($this->base_view.'index', compact('radacct'));
    }


    public function kick_user(doKickUserService $kick)
    {
        return $kick->handle();
    }


}
