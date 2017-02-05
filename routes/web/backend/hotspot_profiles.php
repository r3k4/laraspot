<?php 

Route::group(['prefix' => 'hotspot_profiles'], function(){

	Route::get("/",[
		'as'	=> 'backend.hotspot_profile.index',
		'uses'	=> 'HotspotProfileController@index'
	]);

	Route::get("create",[
		'as'	=> 'backend.hotspot_profile.create',
		'uses'	=> 'HotspotProfileController@create'
	]);

	Route::post("insert",[
		'as'	=> 'backend.hotspot_profile.insert',
		'uses'	=> 'HotspotProfileController@insert'
	]);

	Route::get("manage_radgroupreply/{mst_profile_id}",[
		'as'	=> 'backend.hotspot_profile.manage_radgroupreply',
		'uses'	=> 'HotspotProfileController@manage_radgroupreply'
	]);

	Route::get("manage_radgroupreply_create/{mst_profile_id}",[
		'as'	=> 'backend.hotspot_profile.manage_radgroupreply_create',
		'uses'	=> 'HotspotProfileController@manage_radgroupreply_create'
	]);

	Route::post("manage_radgroupreply_insert",[
		'as'	=> 'backend.hotspot_profile.manage_radgroupreply_insert',
		'uses'	=> 'HotspotProfileController@manage_radgroupreply_insert'
	]);



});