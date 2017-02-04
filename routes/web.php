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
    return view('welcome');
});
 

require __DIR__.'/web/auth.php'; 

Route::group(['namespace' => 'Backend', 'prefix' => 'backend', 'middleware' => 'auth'],
	function(){
	
	require __DIR__.'/web/backend/profile.php'; 

});

Route::get('/home', 'HomeController@index');

 