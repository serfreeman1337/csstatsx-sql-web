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

Route::get('', "PlayerController@index")->name('players.index');
Route::get('players/{authid}', 'PlayerController@show')->name('players.show');
Route::get('players/{authid}/weapons', 'PlayerWeaponController@index')->name('players.show.weapons');
Route::get('players/{authid}/maps', 'PlayerMapController@index')->name('players.show.maps');
Route::get('weapons', 'WeaponController@index')->name('weapons.index');
Route::get('weapons/{weapon}', 'WeaponController@show')->name('weapons.show');
Route::get('maps', 'MapController@index')->name('maps.index');
Route::get('maps/{map}', 'MapController@show')->name('maps.show');
