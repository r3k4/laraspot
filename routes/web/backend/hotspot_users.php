<?php 

Route::group(['prefix' => 'hotspot_users'], function(){

	Route::get("/",[
		'as'	=> 'backend.hotspot_users.index',
		'uses'	=> 'HotspotUsersController@index'
	]);

	Route::get("create",[
		'as'	=> 'backend.hotspot_users.create',
		'uses'	=> 'HotspotUsersController@create'
	]);

	Route::post("insert",[
		'as'	=> 'backend.hotspot_users.insert',
		'uses'	=> 'HotspotUsersController@insert'
	]);


	Route::get("edit/{id}",[
		'as'	=> 'backend.hotspot_users.edit',
		'uses'	=> 'HotspotUsersController@edit'
	]);

	Route::post("update",[
		'as'	=> 'backend.hotspot_users.update',
		'uses'	=> 'HotspotUsersController@update'
	]);

 
	Route::post("delete",[
		'as'	=> 'backend.hotspot_users.delete',
		'uses'	=> 'HotspotUsersController@delete'
	]);


	Route::get("view_credentials/{id}",[
		'as'	=> 'backend.hotspot_users.view_credentials',
		'uses'	=> 'HotspotUsersController@view_credentials'
	]);


	Route::get("import",[
		'as'	=> 'backend.hotspot_users.import',
		'uses'	=> 'HotspotUsersController@import'
	]);


});