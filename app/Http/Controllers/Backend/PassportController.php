<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PassportController extends Controller
{
    public $base_view = 'konten.backend.passport.';

    public function __construct()
    {
    	view()->share('backend_passport_home', true);
    	view()->share('base_view', $this->base_view);
    }

    public function index()
    {
    	return view($this->base_view.'index');
    }

}
