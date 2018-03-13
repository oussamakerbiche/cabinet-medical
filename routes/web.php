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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('rdv', 'RdvController@index');
Route::post('rdv','RdvController@store');
Route::get('listerdvs',[
               
            'middleware' => 'auth',

            'uses' => 'RdvController@listerdvs'
]);
Route::put('rdv/{id}','RdvController@update');
