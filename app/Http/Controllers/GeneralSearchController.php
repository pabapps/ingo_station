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

class GeneralSearchController extends Controller
{
    
	public function general_search(){

		$project_list = IngoProjects::where('valid',1)->get();

		// dd($project_list);
		$district_name = array();
		$thana_name = array();

		foreach ($project_list as $project) {

			$project_district = ProjectDistrict::where('project_id',$project->id)->get();

			$names_of_districts = "";

			foreach ($project_district as $district) {
				
				$dist = District::where('id',$district->district_id)->first();

				$names_of_districts = $names_of_districts.$dist->name.",";

			}

			$district_name[$project->id] = $names_of_districts;

			$project_thanas = ProjectUpazila::where('project_id',$project->id)->get();

			$names_of_thanas = "";

			 foreach ($project_thanas as $thanas) {
			 	
			 	$thana = Upazila::where('id',$thanas->project_id)->first();

			 	$names_of_thanas = $names_of_thanas.$thana->name.",";

			 }

			 $thana_name[$project->id] = $names_of_thanas;

			
		}

		$final_array = array();
		$count = 1;

		foreach ($project_list as $project) {
			$district = "";

			if(array_key_exists($project->id, $district_name)){

				$district = $district_name[$project->id];

			}

			$upazila = "";

			if(array_key_exists($project->id,$thana_name)){

				$upazila = $thana_name[$project->id];

			}

			$iNgo = Ingos::where('id',$project->ingo_office_id)->first();


			$final_array[$count] = array(
				'project'=> $project,
				'ingo'=>$iNgo,
				'district'=> $district,
				'upazila'=>$upazila
				);

			$count++;

		}
		return view('GeneralSearch.search')->with('final_array',$final_array); 

	}

	public function get_project_id(Request $request){

		$search_term = $request->input('term');

        $query_projects= "
        SELECT ingo_projects.id , ingo_projects.project_name AS text
        FROM ingo_projects WHERE ingo_projects.project_name LIKE '%{$search_term}%'";

        $projects = DB::select($query_projects);


        return response()->json($projects);

	}
































}
