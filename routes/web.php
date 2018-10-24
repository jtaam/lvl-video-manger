<?php


Route::get('/', 'GuestController@welcome')->name('welcome');
Route::get('/activate-account/{token}','GuestController@verify')->name('activate-account');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
