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

//Route::get('/admin/user/','UserController@index');

Route::get('/profile','UserController@profile');
Route::post('/send','ChatroomController@send');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/getmess','ChatroomController@fetch');

//STUDENT ROUTE
Route::get('/students','StudentController@index');
Route::get('/students/create','StudentController@create');
Route::post('/students','StudentController@store');
Route::get('/students/{studentID}','StudentController@show');
Route::get('/students/{studentID}/edit','StudentController@edit');
Route::put('/students/{studentID}','StudentController@update');

//TUTOR ROUTE
Route::get('/tutors','TutorController@index');
Route::get('/tutors/create','TutorController@create');
Route::post('/tutors','TutorController@store');
Route::get('/tutors/{tutorID}','TutorController@show');
Route::get('/tutors/{tutorID}/edit','TutorController@edit');
Route::put('/tutors/{tutorID}','TutorController@update');

//STAFF ROUTE (CAN ONLY ADDED BY ADMIN)
Route::get('/staffs','StaffController@index');
Route::get('/staffs/create','StaffController@create');
Route::post('/staffs','StaffController@store');
Route::get('/staffs/{staffID}','StaffController@show');
Route::get('/staffs/{staffID}/edit','StaffController@edit');
Route::put('/staffs/{staffID}','StaffController@update');

//CLASSROOM ROUTE
Route::get('/classrooms','ClassroomController@index');
Route::get('/classrooms/create','ClassroomController@create');
Route::post('/classrooms','ClassroomController@store');

Route::prefix('admin')->name('admin.')->group(function (){
    Route::resource('/user','UserController',['except'=>['show','create','store']]);
});

