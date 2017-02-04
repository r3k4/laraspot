<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public $base_view = 'konten.backend.profile.';

    public function __construct()
    {
    	view()->share('backend_profile_home', true);
    	view()->share('base_view', $this->base_view);
    }

    public function index()
    {
    	return view($this->base_view.'index');
    }

    public function update_profile()
    {
        $this->validate(request(),[
            'password_lama' => 'required',
            'password'      => 'required|confirmed'
        ]);

        return request()->all();
    }

}
