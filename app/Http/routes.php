<?php

Route::get('/', function () {
    return view('welcome');
});

// Login
Route::get('/login','LoginController@index');
Route::post('/login','LoginController@index');

Route::get('/home','HomeController@index');

Route::get('/auth', 'ApiLineController@auth');
Route::post('/auth', 'ApiLineController@auth');

Route::get('/callback', 'ApiLineController@callback');
Route::post('/callback', 'ApiLineController@callback');