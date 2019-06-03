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

Route::get('/', 'Front@index')->name('dashboard');
Route::resource('vehicles','Vehicles');
Route::resource('packages','Packages', ['except' => 'delete'] );
Route::get('/packages/delete/{id}','Packages@destroy')->name('packages.destroy');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
