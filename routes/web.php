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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('points')->group(function () {

    Route::get('/', 'PointController@index')->name('points.index');

    Route::get('/create', 'PointController@create');
    Route::post('/create', 'PointController@store')->name('points.store');
});

Route::prefix('badges')->group(function () {

    Route::get('/', 'BadgeController@index');

    Route::get('/create', 'BadgeController@create');
    Route::post('/create', 'BadgeController@store')->name('badges.store');
});
