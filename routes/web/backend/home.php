<?php 

Route::get('/home', [
	'as'	=> 'backend.home.index',
	'uses'	=> 'HomeController@index'
]);

Route::get('/home/statistik', [
	'as'	=> 'backend.home_statistik.index',
	'uses'	=> 'HomeController@statistik'
]);

