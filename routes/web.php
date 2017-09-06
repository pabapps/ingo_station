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
    return view('main.landing');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/ingo_maps','IngoController@maps');

Route::resource('/ingo','IngoController');

//ajax query to get all the districts
Route::get('/get_disticts','IngoProjectsController@get_district');

//ajax query to get upazilas based on the selected district
Route::get('/get_upazila','IngoProjectsController@get_upazila');

//route for searching by district id
Route::get('/ingo_project/get_project_by_district','IngoController@get_project_by_district');

//route for searching by theme
Route::get('/ingo_project/get_project_by_theme','IngoController@get_project_by_theme');

//route for searching by both themes and district
Route::get('/ingo_project/get_project_by_district_theme','IngoController@get_project_by_district_theme');


Route::resource('/ingo_project','IngoProjectsController');


//project id for the general search
Route::get('/search/get_project_id','GeneralSearchController@get_project_id');

//district id for the general search
Route::get('/search/get_distict_id','GeneralSearchController@get_distict_id');


Route::get('/search','GeneralSearchController@general_search');

