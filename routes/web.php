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
Route::Resource('/flats' , 'FlatController');
Route::get('/book/{id}' ,'FlatController@book');
Route::post('/book/{id}' ,'FlatController@book');
Route::get('/account' , 'UserController@index');
Route::post('/account' , 'UserController@update');
Route::post('/flats/{id}', 'FlatCommentController@store');
Route::get('/control' , 'adminController@admin');
Route::get('/all' , 'adminController@all');
Route::get('/adduser' , 'adminController@create');
Route::post('/addu' , 'adminController@store');
Route::get('/udelete/{id}' , 'adminController@udelete');
Route::get('/flatAccess' , 'adminController@flatAccess');
Route::get('/notActive' , 'adminController@notActive');
Route::get('/activate/{id}' , 'adminController@activate');
Route::any('/search','FlatController@search');
Route::get('/bookedflats', 'adminController@BookedFlats');

