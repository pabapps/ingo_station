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

			$project_info = IngoProjects::where('id',$project_id)->where('valid',1)->first();

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

				$project = IngoProjects::where('id',$selected_project->project_id)->where('valid',1)->first();

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

		//search by theme 
		if($theme_id!=null && $project_id==null && $district_id==null){

			//get all the projects by this particular theme
			$projects_selected_from_the_theme = IngoProjects::where('theme',$theme_id)->where('valid',1)->get();

			$ingo_offices = array();

			$project_districts = array();

			//getting the officed from the selected proejcts
			foreach ($projects_selected_from_the_theme as $selected_project) {
				
				$office = Ingos::where('id',$selected_project->ingo_office_id)->first();

				$ingo_offices[$selected_project->id] = $office;


				//get all the districts in where this particular project is taking place
				$selected_districts = ProjectDistrict::where('project_id',$selected_project->id)->get();


				$district_string = "";

				foreach ($selected_districts as $dist) {
					
					$dist = District::where('id',$dist->district_id)->first();

					$district_string = $district_string.$dist->name.",";

				}


				$project_districts[$selected_project->id] = $district_string;

			}


			$final_array = array();
			$count = 0;

			foreach ($projects_selected_from_the_theme as $selected_project) {

				$demo_office;
				
				if(array_key_exists($selected_project->id,$ingo_offices)){

					$demo_office = $ingo_offices[$selected_project->id];

				}

				$demo_district;

				if(array_key_exists($selected_project->id,$project_districts)){

					$demo_district = $project_districts[$selected_project->id];

				}

				$final_array[$count] = array(
					'project'=>$selected_project,
					'ingo'=>$demo_office,
					'district'=> $demo_district

					);

				$count++;


			}

			// dd($final_array);

			return json_encode($final_array);

		}

		if($project_id!=null && $district_id!=null && $theme_id==null){

			//selecting the project form the given project_id
			$selected_project = IngoProjects::where('id',$project_id)->first();

			$project_found = false;
			$project_district_found = false;

			$district_string = "";
			$ingo_office;

			if(sizeof($selected_project)>0){

				$project_found = true;

			}

			if($project_found){

				$project_districts = ProjectDistrict::where('project_id',$project_id)->get();

				foreach ($project_districts as $p_dist) {
					
					$selected_district = District::where('id',$p_dist->district_id)->first();

					if($selected_district->id==$district_id){

						$project_district_found = true;

					}
				}

				$ingo_office = Ingos::where('id',$selected_project->ingo_office_id)->first();

				if($project_district_found){

					foreach ($project_districts as $p_dist) {

						$selected_district = District::where('id',$p_dist->district_id)->first();

						$district_string = $district_string.$selected_district->name.",";
					}

					
				}

			}

			$final_array = array();
			$count = 0;

			if($project_found && $project_district_found){

				$final_array[$count] = array(
					'project'=>$selected_project,
					'ingo'=>$ingo_office,
					'district'=> $district_string

					);

				return json_encode($final_array);

			}else{

				return json_encode($final_array);


			}

		}

		//search by project_id and theme_id not by district_id

		if($project_id!=null && $district_id==null && $theme_id!=null){

			$selected_project = IngoProjects::where('id',$project_id)->where('theme',$theme_id)->first();

			$ingo_office = Ingos::where('id',$selected_project->ingo_office_id)->first();

			$project_districts = ProjectDistrict::where('project_id',$project_id)->get();

			$district_string = "";

			foreach ($project_districts as $p_dist) {
				
				$project_district = District::where('id',$p_dist->district_id)->first();

				$district_string = $district_string.$project_district->name.",";

			}

			$final_array = array();
			$count = 0;

			$final_array[$count] = array(
				'project'=>$selected_project,
				'ingo'=>$ingo_office,
				'district'=> $district_string

				);

			return json_encode($final_array);

		}

		//search by district_id and theme_id excepty project_id

		if($project_id==null && $district_id!=null && $theme_id!=null){

			//selecting projects by the theme_id
			$project_by_theme_id = IngoProjects::where('theme',$theme_id)->get();

			//scanning the porjects for this particual district
			
			$selected_project_id_district = array();
			$ingo_offices = array();
			$project_districts = array();

			foreach ($project_by_theme_id as $project_by_theme) {
				
				$project_district_pivot = ProjectDistrict::where('project_id',$project_by_theme->id)
				->where('district_id',$district_id)->first();

				if(sizeof($project_district_pivot)>0){

					$selected_project_id_district[$project_by_theme->id] = 
					IngoProjects::where('id',$project_district_pivot->project_id)->first();
				}

			}


			foreach ($selected_project_id_district as $selected_project) {

				$office = Ingos::where('id',$selected_project->ingo_office_id)->first();

				$ingo_offices[$selected_project->id] = $office;

				$selected_project_district = ProjectDistrict::where('project_id',$selected_project->id)->get();

				$district_string = "";

				foreach ($selected_project_district as $p_dist) {
					
					$district = District::where('id',$p_dist->district_id)->first(); 

					$district_string = $district_string.$district->name.",";	

				}

				$project_districts[$selected_project->id] = $district_string; 


			}


			$final_array = array();
			$count = 0;

			if(sizeof($selected_project_id_district)>0 && sizeof($project_districts)>0){

				foreach ($selected_project_id_district as $selected_project) {

					$dummy_project;
					
					if(array_key_exists($selected_project->id, $selected_project_id_district)){
						$dummy_project = $selected_project;
					}

					$dummy_ingo;

					if(array_key_exists($selected_project->id,$ingo_offices)){

						$dummy_ingo = $ingo_offices[$selected_project->id];

					}

					$dummy_district;

					if(array_key_exists($selected_project->id,$project_districts)){

						$dummy_district = $project_districts[$selected_project->id];

					}

					$final_array[$count] = array(

						'project'=>$dummy_project,
						'ingo'=>$dummy_ingo,
						'district'=> $dummy_district

						);

					$count++;

				}

			}

			return json_encode($final_array);


		}

		if($project_id!=null && $district_id!=null && $theme_id!=null){

			$selected_project = IngoProjects::where('id',$project_id)->where('theme',$theme_id)->first();

			$ingo_office = Ingos::where('id',$selected_project->ingo_office_id)->first();

			$project_districts = ProjectDistrict::where('project_id',$project_id)->get();

			$project_district_found = false;

			$district_string = "";

			foreach ($project_districts as $p_dist) {

				$selected_district = District::where('id',$p_dist->district_id)->first();

				if($selected_district->id==$district_id){

					$project_district_found = true;

				}
			}

			if($project_district_found){

				foreach ($project_districts as $p_dist) {

					$selected_district = District::where('id',$p_dist->district_id)->first();

					$district_string = $district_string.$selected_district->name.",";
				}


			}


			$final_array = array();
			$count = 0;

			if($project_district_found){

				$final_array[$count] = array(
					'project'=>$selected_project,
					'ingo'=>$ingo_office,
					'district'=> $district_string

					);

				return json_encode($final_array);

			}else{

				return json_encode($final_array);


			}


			

		}





	}
































}
