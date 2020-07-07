<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');

Route::get('/cabinet', 'Cabinet\HomeController@index')->name('cabinet');
Route::get('/form', 'Auth\RegisterController@form')->name('form');
Route::post('/register', 'Auth\RegisterController@register')->name('register');

