<?php 

Route::group(['prefix' => 'hotspot_users'], function(){

	Route::get('/',[
		'uses'	=> 'HotspotUsersController@getAllUsers'
	]);

	Route::get('find/{id}',[
		'uses'	=> 'HotspotUsersController@find'
	]);


	Route::get('findBy/{username}',[
		'uses'	=> 'HotspotUsersController@findBy'
	]);

	Route::post('create',[
		'uses'	=> 'HotspotUsersController@create'
	]);	

});