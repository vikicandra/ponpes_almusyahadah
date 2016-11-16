<?php


Route::get('/', 'SantriController@cekLogin');


Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@logout');
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

Route::group(['prefix' => 'admin', 'middleware' =>'auth'], function(){
	Route::auth();
	Route::get('/', 'SantriController@index');

	Route::group(['prefix' => '/suratizin'], function(){
		Route::get('/', 'SuratIzinController@allSantri');
		Route::get('/addNew', 'SuratIzinController@addNew');
		Route::post('/insert', 'SuratIzinController@insert')->name('insertSuratizin');
		Route::get('/print/{id}', 'SuratIzinController@printSuratIzin');
	});
	

	Route::group(['prefix' => '/santri'], function(){
		Route::get('/addNew', 'SantriController@addNew');
		Route::post('/insert', 'SantriController@insert' )->name('insertSantri');
		// Route::post('/validPhoto', 'SantriController@validPhoto' )->name('validPhoto');
		Route::get('/delete/{id}', 'SantriController@delete' );
		Route::get('/edit/{id}', 'SantriController@edit' );
		Route::put('/edit', 'SantriController@editData' )->name('editSantri');
	});

});