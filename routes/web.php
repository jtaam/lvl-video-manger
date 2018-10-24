<?php

//use App\Mail\ActivateUserAccount;
//use App\User;
//
//Route::get('mail',function(){
//    $user = User::find(1);
//    return new ActivateUserAccount($user);
//});

Route::get('/', 'GuestController@welcome')->name('welcome');
Route::get('/activate-account/{token}','GuestController@verify')->name('activate-account');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
