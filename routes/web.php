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

Route::get('/', 'HomeController@index');
//Test
Route::get('/test', 'HomeController@test')->name('test');
//Exam
Route::get('/{id}/exam', 'HomeController@exam')->name('exam');
Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Developer
Route::resource('patient','PatientController');
Route::resource('secretaire','SecretaireController')->middleware('checkRole');
Route::resource('technicien','TechnicienController')->middleware('checkRole');
Route::resource('rende','RdvController');
Route::resource('test','TestController');
Route::resource('item','ItemController');
Route::resource('exam','ExamController');

//RH
Route::get('/rh', 'RhController@index')->name('rh');
