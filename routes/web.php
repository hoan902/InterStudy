<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/Testing', function () {
    return view('Testing');
});
Auth::routes();

Route::post('/send','ChatroomController@send');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/classroom','ClassroomController@index');

Auth::routes();

Route::get('/getmess','ChatroomController@fetch');
Route::get('/home', 'HomeController@index')->name('home');
