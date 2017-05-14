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

Route::resource('/locations', 'LocationController');

Route::resource('/events', 'EventController');

Route::resource('/tags', 'TagController');

Route::get('/login', 'LoginController@index');

Route::get('/logout', 'LoginController@logout');

Route::post('/login', 'LoginController@login');

Route::get('/', 'SiteController@index');
