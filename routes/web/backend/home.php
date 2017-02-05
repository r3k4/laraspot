<?php 

Route::get('/home', [
	'as'	=> 'backend.home.index',
	'uses'	=> 'HomeController@index'
]);