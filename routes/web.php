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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Developer
Route::resource('patient','PatientController')->middleware('checkRole');
Route::resource('secretaire','SecretaireController')->middleware('checkRole');
Route::resource('rende','RdvController');
// Mr hedi if you want to add prevent a non previliged user from accessing a specific route just aad tha middleware to the routes
//thank you for your understading hhhh
// P.S: I am already blocking non admin users to acces the patient route
