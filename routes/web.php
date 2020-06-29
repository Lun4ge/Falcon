<?php
Auth::routes();
Route::get('/', 'Homecontroller@mapview');
Route::get('/home', 'Homecontroller@mapview');

    Route::group(['middleware' => ['auth']], function(){
        Route::resource('locais', 'LocaisController');
        Route::get('locais/{id}/delete','LocaisController@delete');

        Route::resource('eventos', 'EventosController');
        Route::get('eventos/{id}/delete','EventosController@delete');

        Route::resource('items', 'ItemsController');
        Route::get('items/{id}/delete','ItemsController@delete');
        Route::get('items/{id}/unique','ItemsController@unique');
       
        Route::group(['middleware' => ['admin']], function () {
          Route::resource('users', 'UsersController');
          Route::get('users/{id}/delete','UsersController@delete');
        });
      });