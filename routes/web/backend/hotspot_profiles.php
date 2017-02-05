<?php 

Route::group(['prefix' => 'hotspot_profiles'], function(){

	Route::get("/",[
		'as'	=> 'backend.hotspot_profile.index',
		'uses'	=> 'HotspotProfileController@index'
	]);

});