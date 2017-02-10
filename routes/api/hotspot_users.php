<?php 

Route::group(['prefix' => 'hotspot_users'], function(){

	Route::get('/',[
		'uses'	=> 'HotspotUsersController@getAllUsers'
	]);

	Route::post('create',[
		'uses'	=> 'HotspotUsersController@create'
	]);	

});