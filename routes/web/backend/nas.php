<?php 

Route::group( ['prefix' => 'nas'], function(){

	Route::get('/', [
		'as'	=> 'backend.nas.index',
		'uses'	=> 'NasController@index'
	]);

	Route::get('create', [
		'as'	=> 'backend.nas.create',
		'uses'	=> 'NasController@create'
	]);

	Route::post('insert', [
		'as'	=> 'backend.nas.insert',
		'uses'	=> 'NasController@insert'
	]);
 
	Route::get('edit/{id}', [
		'as'	=> 'backend.nas.edit',
		'uses'	=> 'NasController@edit'
	]);

	Route::post('update', [
		'as'	=> 'backend.nas.update',
		'uses'	=> 'NasController@update'
	]);

	Route::get('view_resource/{id}', [
		'as'	=> 'backend.nas.view_resource',
		'uses'	=> 'NasController@view_resource'
	]);

	Route::post('delete', [
		'as'	=> 'backend.nas.delete',
		'uses'	=> 'NasController@delete'
	]);


});