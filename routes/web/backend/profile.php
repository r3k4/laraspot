<?php 

Route::group( ['prefix' => 'profile'], function(){

	Route::get('/', [
		'as'	=> 'backend.profile.index',
		'uses'	=> 'ProfileController@index'
	]);


	Route::post('update_profile', [
		'as'	=> 'backend.profile.update_profile',
		'uses'	=> 'ProfileController@update_profile'
	]);


});