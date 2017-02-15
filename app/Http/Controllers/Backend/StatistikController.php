<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Radacct;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    public $base_view = 'konten.backend.statistik.';
    protected $radacct;

    public function __construct(Radacct $radacct)
    {
    	$this->radacct = $radacct;
    	view()->share('backend_statistik_home', true);
    	view()->share('base_view', $this->base_view);
    }

    public function index()
    {
    	$radacct = $this->radacct;
    	return view($this->base_view.'index', compact('radacct'));
    }

}
