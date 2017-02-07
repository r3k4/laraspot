<?php 

Route::group(['prefix' => 'passport'], function(){

	Route::get("/",[
		'as'	=> 'backend.passport.index',
		'uses'	=> 'PassportController@index'
	]);

 
});