<?php 

Route::group([ 'prefix' => 'usages'], function(){

	Route::get('/',[
		'as'	=> 'backend.usages.index',
		'uses'	=> 'UsagesController@index'
	]);

	Route::get('statistics',[
		'as'	=> 'backend.usages.statistics',
		'uses'	=> 'UsagesController@statistics'
	]);


});