<?php 

Route::group(['prefix' => 'user_aktif'], function(){

	Route::get("/",[
		'as'	=> 'backend.user_aktif.index',
		'uses'	=> 'UserAktifController@index'
	]);

	Route::post("kick_user",[
		'as'	=> 'backend.user_aktif.kick_user',
		'uses'	=> 'UserAktifController@kick_user'
	]); 

	Route::post("kick_all",[
		'as'	=> 'backend.user_aktif.kick_all',
		'uses'	=> 'UserAktifController@kick_all'
	]); 


});