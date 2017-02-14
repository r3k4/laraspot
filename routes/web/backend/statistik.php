<?php 

Route::group( ['prefix' => 'statistik'], function(){

	Route::get('/', [
		'as'	=> 'backend.statistik.index',
		'uses'	=> 'StatistikController@index'
	]);
 

});