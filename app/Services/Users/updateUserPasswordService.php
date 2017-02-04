<?php 

namespace App\Services\Users;

use Illuminate\Foundation\Validation\ValidatesRequests;

class updateUserPasswordService 
{

	use ValidatesRequests;


	public function handle()
	{
        // password system
        $this->validate(request(),[
            'password_lama' => 'required',
            'password'      => 'required|confirmed'
        ]);

        if (\Hash::check(request()->password_lama, auth()->user()->password)) {
            auth()->user()->whereId(auth()->user()->id)->update(['password' => request()->password]);
            return back()->with('pesan', 'password telah ter-update');
        }
        // end of password system

        // password hotspot
        
        // end of password hotspot 

        return back()->with('pesan_error', 'password gagal ter-update');
	}	


}