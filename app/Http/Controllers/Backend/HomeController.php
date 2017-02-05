<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public $base_view = 'konten.backend.home.';

    public function __construct()
    {
        view()->share('base_view', $this->base_view);
        view()->share('backend_home', true);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->base_view.'index');
    }
}
