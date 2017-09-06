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

	public function get_distict_id(Request $request){

		$search_term = $request->input('term');

		$query_districts= "
		SELECT districts.id , districts.name AS text
		FROM districts WHERE districts.name LIKE '%{$search_term}%'";

		$districts = DB::select($query_districts);


		return response()->json($districts);

	}

	public function general_search_query(Request $request){

		$project_id = $request->project_id;

		$district_id = $request->district_id;

		$theme_id = $request->theme_id;

		//searching only by project_id
		if($project_id!=null && $district_id==null && $theme_id==null){

			$project_info = IngoProjects::where('id',$project_id)->first();

			$ingo_office = Ingos::where('id',$project_info->ingo_office_id)->first();

			$district_array = array();

			$district_name = "";

			$project_district = ProjectDistrict::where('project_id',$project_info->id)->get();

			foreach ($project_district as $dist) {

				$districts = District::where('id',$dist->district_id)->first();

				$district_name = $district_name.$districts->name.",";

			}

			$district_array[$project_id] = $district_name; 

			$final_array = array();

			$count = 0;

			$final_array[$count] = array(
				'project'=>$project_info,
				'ingo'=>$ingo_office,
				'district'=> $district_name
				);

			// dd($final_array);

			return json_encode($final_array);


		}


		//search by district
		if($district_id!=null && $theme_id==null && $project_id==null){

			//take all the project that belongs to this particular district
			$selected_project_id = ProjectDistrict::where('district_id',$district_id)->get();

			$project_objects = array();
			$ingo_offices = array();
			$project_districts = array();

			$final_array = array();

			$count = 0;

			foreach ($selected_project_id as $selected_project) {

				$project = IngoProjects::where('id',$selected_project->project_id)->first();

				$ingo_office = DB::table('ingos')
				->join('ingo_projects','ingos.id','=','ingo_projects.ingo_office_id')
				->select('ingos.*')->where('ingo_projects.id',$selected_project->project_id)->first();

				$project_objects[$selected_project->project_id] = $project;
				$ingo_offices[$selected_project->project_id] = $ingo_office;

				$selected_districts_id = ProjectDistrict::where('project_id',$selected_project->project_id)->get();

				$district_string = "";

				foreach ($selected_districts_id as $selected_district) {
					
					$district = District::where('id',$selected_district->district_id)->first();	

					$district_string = $district_string.$district->name.",";

				}

				$project_districts[$selected_project->project_id] = $district_string;

			}

			foreach ($selected_project_id as $selected_project) {

				$demo_project;

				if(array_key_exists($selected_project->project_id,$project_objects)){

					$demo_project = $project_objects[$selected_project->project_id];

				}

				$demo_office;

				if(array_key_exists($selected_project->project_id,$ingo_offices)){
					$demo_office = $ingo_offices[$selected_project->project_id];

				}

				$demo_district;

				if(array_key_exists($selected_project->project_id,$project_districts)){
					$demo_district = $project_districts[$selected_project->project_id];
				}

				$final_array[$count] = array(
					'project'=>$demo_project,
					'ingo'=>$demo_office,
					'district'=> $demo_district

					);

				$count++;
			}

			



			// dd($final_array);

			return json_encode($final_array);


		}



	}
































}
