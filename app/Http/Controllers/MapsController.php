<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingos;
use App\IngoProjects;
use App\ProjectDistrict;
use App\ProjectUpazila;
use App\District;
use App\Upazila;
use Crypt;
use Response;
use DB;

//testing
use App\MapCode\MapRelated;

class MapsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $all_projects = IngoProjects::where('valid',1)->get();

        return view('maps.ingo_map')->with('all_projects',$all_projects);
    }

    // get all the district for a specific project
    public function get_districts(Request $request){

        $district_name = MapRelated::district_for_project($request); 

        return json_encode($district_name);

        
    }

    /**
     * ingo office id for the maps 
     */

    public function get_ingos(Request $request){


        $search_term = $request->input('term');

        $query_ingos= "
        SELECT ingos.id , ingos.ingo_name AS text
        FROM ingos WHERE ingos.ingo_name LIKE '%{$search_term}%'";

        $ingos = DB::select($query_ingos);


        return response()->json($ingos);
    }

    /*
    
     */
    
    public function get_disticts_for_ingos(Request $request){

        $district_name = MapRelated::get_district_for_ingo($request);        

        return json_encode($district_name);

    }

    /**
     * get the districts from the selected theme
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function get_district_by_theme(Request $request){


        $district_name = MapRelated::get_district_by_theme($request);    

        return json_encode($district_name);


    }


    public function get_districts_by_theme_ingo_office(Request $request){

        $district_name = MapRelated::get_district_by_theme($request);

        return json_encode($district_name);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
