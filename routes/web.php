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

Route::resource('/ingo','IngoController');

//ajax query to get all the districts
Route::get('/get_disticts','IngoProjectsController@get_district');

//ajax query to get upazilas based on the selected district
Route::get('/get_upazila','IngoProjectsController@get_upazila');


Route::resource('/ingo_project','IngoProjectsController');

