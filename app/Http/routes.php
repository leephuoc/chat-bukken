<?php

Route::get('/', function () {
    return view('welcome');
});

// Login
Route::get('/login','LoginController@index');
Route::post('/login','LoginController@index');

Route::get('/home','HomeController@index');