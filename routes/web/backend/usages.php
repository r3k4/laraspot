<?php 

Route::group([ 'prefix' => 'usages'], function(){

	Route::get('/',[
		'as'	=> 'backend.usages.index',
		'uses'	=> 'UsagesController@index'
	]);

});