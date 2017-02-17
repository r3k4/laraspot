<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('konten.frontend.home.index');
});
 

require __DIR__.'/web/auth.php'; 

Route::group(['namespace' => 'Backend', 'prefix' => 'backend', 'middleware' => 'auth'],
	function(){
	
	require __DIR__.'/web/backend/home.php'; 
	require __DIR__.'/web/backend/profile.php'; 
	require __DIR__.'/web/backend/usages.php'; 

	Route::group(['middleware' => 'hanya_admin'], function(){
		require __DIR__.'/web/backend/hotspot_profiles.php'; 
		require __DIR__.'/web/backend/hotspot_users.php'; 
		require __DIR__.'/web/backend/user_aktif.php'; 
		require __DIR__.'/web/backend/passport.php'; 
		require __DIR__.'/web/backend/nas.php'; 
		require __DIR__.'/web/backend/statistik.php'; 
	});
	

});



 