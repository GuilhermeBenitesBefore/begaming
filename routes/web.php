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

use App\Mail\ResetaPassword;
use Illuminate\Support\Facades\Mail;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('points')->group(function () {

    Route::get('/', 'PointController@index')->name('points.index');

    Route::get('/create', 'PointController@create')->middleware('admin');
    Route::post('/create', 'PointController@store')->name('points.store');
});

Route::prefix('badges')->group(function () {

    Route::get('/', 'BadgeController@index')->name('badges.index');

    Route::get('/create', 'BadgeController@create');
    Route::post('/create', 'BadgeController@store')->name('badges.store');
});

Route::prefix('users')->group(function () {

    Route::get('/', 'UserController@index')->name('users.index');

    Route::get('/create', 'UserController@create');
    Route::post('/create', 'UserController@store')->name('users.store');
});

Route::get('envio-email-recuperacao-senha', function(){

    //@todo Pegar esses dados do BD, este é apenas um exemplo
    $user = new App\User();
    $user->name = 'Gabriel';
    $user->email = 'gabrielbittardomingues@gmail.com';

    Mail::send(new ResetaPassword($user));
});
