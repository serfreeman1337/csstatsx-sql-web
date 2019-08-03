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
Route::get('search', 'PlayerController@search')->name('players.search');
Route::get('players/{authid}', 'PlayerController@show')->name('players.show');

if (env('CSSTATS_SQL_WEAPONS')) {
    Route::get('players/{authid}/weapons', 'PlayerWeaponController@index')->name('players.show.weapons');
    Route::get('weapons', 'WeaponController@index')->name('weapons.index');
    Route::get('weapons/{weapon}', 'WeaponController@show')->name('weapons.show');
}

if (env('CSSTATS_SQL_MAPS')) {
    Route::get('players/{authid}/maps', 'PlayerMapController@index')->name('players.show.maps');
    Route::get('maps', 'MapController@index')->name('maps.index');
    Route::get('maps/{map}', 'MapController@show')->name('maps.show');
}
