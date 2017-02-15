<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Nas;
use App\Models\Radacct;
use App\Models\Radcheck;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public $base_view = 'konten.backend.home.';
    protected $radacct;
    protected $radcheck;
    protected $nas;

    public function __construct(Radacct $radacct, Radcheck $radcheck, Nas $nas)
    {
        $this->nas = $nas;
        $this->radcheck = $radcheck;
        $this->radacct = $radacct;
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
        $level = auth()->user()->ref_user_level_id;
        if($level == 1){
            $radacct = $this->radacct;
            $jml_total_user = $this->radcheck->count();
            $jml_nas = $this->nas->count();
            $vars = compact('radacct', 'jml_total_user', 'jml_nas');
            return view($this->base_view.'index_admin', $vars);
        }
        return view($this->base_view.'index');
    }

    public function statistik()
    {
        $radacct = $this->radacct;
        return view($this->base_view.'komponen_admin.load_statistik', compact('radacct'));
    }

}
