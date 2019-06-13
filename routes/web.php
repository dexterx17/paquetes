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
Route::resource('vehicle_types','Vehicle_types');
Route::resource('fuel_types','Fuel_types');
Route::resource('packages','Packages');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
