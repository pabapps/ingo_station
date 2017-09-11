<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingos;
use App\IngoProjects;
use App\District;
use App\Division;
use App\Upazila;
use App\ProjectDistrict;
use App\ProjectUpazila;
use Crypt;
use Auth;
use Response;
use DB;

class IngoProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = Auth::user();

        $ingo_office = Ingos::where('user_id',$user->id)->first();

        return view('projects.project_create')->with('ingo_office',$ingo_office);
    }




    public function get_district(Request $request){

        $search_term = $request->input('term');

        $query_departments= "
        SELECT districts.id , districts.name AS text
        FROM districts WHERE districts.name LIKE '%{$search_term}%'";

        $departments = DB::select($query_departments);


        return response()->json($departments);


    }


    public function get_upazila(Request $request){

        $district = $request->district;



        $search_term = $request->input('term');

        $query_departments= "
        SELECT upazilas.id , upazilas.name AS text
        FROM upazilas WHERE upazilas.district_id IN(".implode(',', array_map('intval', $district)).") AND upazilas.name LIKE '%{$search_term}%'";

        $departments = DB::select($query_departments);


        return response()->json($departments);  




    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());

        

        $ingo_project = new IngoProjects;

        $ingo_project->ingo_office_id = $request->ingo_id;
        $ingo_project->project_name = $request->project_name;
        $ingo_project->theme = $request->theme;
        $ingo_project->key_partners = $request->partners;
        $ingo_project->start_date = \Carbon\Carbon::createFromFormat('d-m-Y', $request->start_date)->toDateString();

        if(!empty($request->end_date)){
            $ingo_project->end_date = \Carbon\Carbon::createFromFormat('d-m-Y', $request->end_date)->toDateString();
        }

        if(!empty($request->project_url)){
            $ingo_project->url = $request->project_url;
        }

        $ingo_project->save();

        $districts = $request->district;

        $upazilas = $request->upazila;

        foreach ($districts as $dist) {

            $district = District::where('id',$dist)->first();

            $project_district = new ProjectDistrict;

            $project_district->project_id = $ingo_project->id;
            $project_district->district_id = $district->id;

            $project_district->save();
        }


        foreach ($upazilas as $upa) {

            $upazila_sub_district = Upazila::where('id',$upa)->first(); 

            $project_upa = new ProjectUpazila;

            $project_upa->project_id = $ingo_project->id;
            $project_upa->upazila_id = $upazila_sub_district->id;

            $project_upa->save();
            
        }

        return redirect()->action('IngoController@create'); 


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
        $project_id = $id;

        $project_detail = IngoProjects::where('id',$project_id)->first();

        $ingo_office = Ingos::where('id',$project_detail->ingo_office_id)->first();

        $project_district = ProjectDistrict::where('project_id',$project_detail->id)->get();

        $districts = array();

        $count = 0;

        foreach ($project_district as $p_dist) {
            
            $dist = District::where('id',$p_dist->district_id)->first();

            $districts[$count] = $dist;

            $count++;

        }

        $project_thanas = ProjectUpazila::where('project_id',$project_detail->id)->get();

        $count = 0;

        $thanas = array();

        foreach ($project_thanas as $p_thanas) {
            
            $thana = Upazila::where('id',$p_thanas->upazila_id)->first();

            $thanas[$count] = $thana;

            $count++;

        }



        return view('projects.project_edit')->with('project',$project_detail)->with('ingo_office',$ingo_office)->with('districts',$districts)
        ->with('project_thanas',$thanas);
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
        $project_id = $id;

        if(!empty($request->project_name){
            $project = IngoProjects::where('id',$project_id)->update(['project_name'=>$request->project_name]);
        }

        if(!empty($request->partners)){
            $project = IngoProjects::where('id',$project_id)->update(['key_partners'=>$request->partners]);
        }

        if(!empty($request->project_url)){
            $project = IngoProjects::where('id',$project_id)->update(['url'=>$request->project_url]);
        }

        if(!empty($request->start_date)){
            $project = IngoProjects::where('id',$project_id)->update(['start_date'=>$request->start_date]);
        }

        if(!empty($request->end_date)){
            $project = IngoProjects::where('id',$project_id)->update(['end_date'=>$request->end_date]);
        }

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
