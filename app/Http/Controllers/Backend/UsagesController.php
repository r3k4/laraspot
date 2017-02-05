<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Radacct;
use Illuminate\Http\Request;

class UsagesController extends Controller
{
    public $base_view = 'konten.backend.usages.';

    protected $radacct;

    public function __construct(Radacct $radacct)
    {
    	$this->radacct = $radacct;
    	view()->share('backend_usages_home', true);
    	view()->share('base_view', $this->base_view);
    }

    public function index()
    {
    	$usages = $this->radacct->getAllUsages();
    	return view($this->base_view.'index', compact('usages'));
    }


}
