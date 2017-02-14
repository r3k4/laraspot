<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\RouterOs;
use App\Http\Controllers\Controller;
use App\Models\Nas;
use Illuminate\Http\Request;

class NasController extends Controller
{
    public $base_view = 'konten.backend.nas.';
    protected $nas;

    public function __construct(Nas $nas)
    {
    	view()->share('backend_nas_home', true);
    	$this->nas = $nas;
    	view()->share('base_view', $this->base_view);
    }


    public function index()
    {
    	$nas = $this->nas->orderBy('id', 'DESC')->paginate(10);
    	return view($this->base_view.'index', compact('nas'));
    }

    public function create()
    {
    	return view($this->base_view.'popup.create');
    }

    public function insert()
    {
    	$this->validate(request(),[
			'nasname'			=> 'required',
			'shortname'			=> 'required',
			'ports'				=> 'required',
			'secret'			=> 'required',
			'user_mikrotik'		=> 'required',
			'password_mikrotik'	=> 'required',
    	]);
    	$this->nas->create(request()->except('_token'));    	
    }

    public function view_resource($id, RouterOs $API)
    {
		$API->debug = false;
		$nas = $this->nas->find($id);
		if ($API->connect($nas->nasname, $nas->user_mikrotik, $nas->password_mikrotik)) {
		   $API->write('/system/resource/getall');
		   $READ = $API->read(false);
		   $results = $API->parse_response($READ);
		   $API->disconnect();
    	   return view($this->base_view.'popup.view_resource', compact('results'));
	    }
	    return response(['error' => ['device tdk terhubung']], 422);
    }

    public function edit($id)
    {
    	$nas = $this->nas->find($id);
    	return view($this->base_view.'popup.edit', compact('nas'));
    }

    public function update()
    {
    	$this->validate(request(),[
			'nasname'			=> 'required',
			'shortname'			=> 'required',
			'ports'				=> 'required',
			'secret'			=> 'required',
			'user_mikrotik'		=> 'required',
			'password_mikrotik'	=> 'required',
    	]);
    	$this->nas->whereId(request()->id)->update(request()->except('_token'));
    	return 'ok';
    }

    public function delete()
    {
    	$q = $this->nas->find(request()->id);
    	if(count($q)>0){
    		$q->delete();
    	}
    	return 'ok';
    }

}
