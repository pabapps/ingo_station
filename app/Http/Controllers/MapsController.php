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

        $project_id = $request->project_id;

        $project_details = IngoProjects::where('id',$project_id)->first();

        $districts = ProjectDistrict::where('project_id',$project_id)->get();

        $district_name = array();
        $count = 0;

        foreach ($districts as $dist) {

            $district = District::where('id',$dist->district_id)->first();

            if($district->id == 45){
                $district_name[$count] = "Coxs_Bazar";
            }else{
                $district_name[$count] = $district->name;    
            }

            $count++;
        }

        // dd($district_name);

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

        $ingo_id = $request->ingo_id;

        //get all the projecs under this ingo
        $projects = IngoProjects::where('ingo_office_id',$ingo_id)->get();

        


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
