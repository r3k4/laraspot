<?php 

namespace App\Services\Users;


use App\Models\Radcheck;
use Illuminate\Foundation\Validation\ValidatesRequests;

class updateUserPasswordService 
{

	use ValidatesRequests;

	protected $radcheck;

	public function __construct(Radcheck $radcheck)
	{
		$this->radcheck = $radcheck;
	}


	public function handle()
	{
        // password system
        $this->validate(request(),[
            'password_lama' => 'required',
            'password'      => 'required|confirmed'
        ]);

        if (\Hash::check(request()->password_lama, auth()->user()->password)) {
            auth()->user()->whereId(auth()->user()->id)->update(['password' => bcrypt(request()->password)]);
        }
        // end of password system

        // password hotspot
        $u = $this->radcheck->username()->where('attribute', '=', 'Cleartext-Password')->first();
        $u->value = request()->password;
        $u->save();
        return back()->with('pesan', 'password telah tersimpan');

        // end of password hotspot 

        // return back()->with('pesan_error', 'password gagal ter-update');
	}	


}