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

Route::get('verify/{email}/{verifyToken}','Auth\RegisterController@sendEmailDone')->name('sendEmailDone');

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

//route for deleting a project
Route::get('/ingo_project/delete_project/{id}','IngoProjectsController@delete_project');


Route::resource('/ingo_project','IngoProjectsController');


//project id for the general search
Route::get('/search/get_project_id','GeneralSearchController@get_project_id');

//district id for the general search
Route::get('/search/get_distict_id','GeneralSearchController@get_distict_id');

//route for general search
Route::get('/search/general_search_query','GeneralSearchController@general_search_query');


//showing the details of each project along with the office details
Route::get('/search/project_details_by_id/{id}','GeneralSearchController@project_details_by_id');


Route::get('/search','GeneralSearchController@general_search');

// route for maps

//get all the district for a project
Route::get('/info_maps/get_districts','MapsController@get_districts');

//get all the ingos for the map
Route::get('/info_maps/get_ingos','MapsController@get_ingos');

//get districts from the ingo offices
Route::get('/info_maps/get_disticts_for_ingos','MapsController@get_disticts_for_ingos');

//get districts by theme
Route::get('/info_maps/get_district_ by_theme','MapsController@get_district_by_theme');

//get district by ingo_ofice and district
Route::get('/info_maps/get_districts_by_theme_ingo_office','MapsController@get_districts_by_theme_ingo_office');

Route::resource('/info_maps','MapsController'); 
















