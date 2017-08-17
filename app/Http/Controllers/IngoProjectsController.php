<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingos;
use App\IngoProjects;
use App\District;
use App\Division;
use App\Upazila;
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

        $districts = $request->district;

        $upazilas = $request->upazila;

        $dis_string = "";

        foreach ($districts as $dist) {

            $district = District::where('id',$dist)->first();

            $dis_string = $dis_string."".$district->name.",";
        }

        $upa_string = "";

        foreach ($upazilas as $upa) {

            $upazila_sub_district = Upazila::where('id',$upa)->first(); 

            $upa_string = $upa_string."".$upazila_sub_district->name.",";
        }

        $ingo_project = new IngoProjects;

        $ingo_project->ingo_office_id = $request->ingo_id;
        $ingo_project->project_name = $request->project_name;
        $ingo_project->district_id = $dis_string;
        $ingo_project->upozilla_id = $upa_string;
        $ingo_project->theme = $request->theme;
        $ingo_project->key_partners = $request->partners;
        $ingo_project->start_date = \Carbon\Carbon::createFromFormat('d-m-Y', $request->start_date)->toDateString();

        if(!empty($request->end_date)){
            $ingo_project->end_date = \Carbon\Carbon::createFromFormat('d-m-Y', $request->end_date)->toDateString();
        }

        $ingo_project->save();

        return redirect()->action('IngoProjectsController@create'); 


    }

    public function project_theme(Request $request){

        $user = Auth::user();

        $search_term = $request->input('term');

        $ingo = Ingos::where('user_id',$user->id)->first();

        $ingo_id = $ingo->id;

        $query_ingo_projects = "
        SELECT ingo_projects.id AS id, ingo_projects.theme AS text 
        FROM ingo_projects WHERE ingo_projects.ingo_office_id='$ingo_id' AND ingo_projects.valid=1 AND ingo_projects.theme LIKE '%{$search_term}%'";

        $ingo_projects = DB::select($query_ingo_projects);


        return response()->json($ingo_projects);  

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
