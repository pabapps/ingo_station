<?php

namespace App\search;

use Illuminate\Http\Request;
use App\User;
use App\Ingos;
use App\IngoProjects;
use App\ProjectDistrict;
use App\ProjectUpazila;
use App\District;
use App\Upazila;
use Auth;

use App\ingoOfficeCode\IngoOfficeUserDomain;

class ProjectSearch{


	//demo funtion
	public static function district_search(Request $request, User $user){

		$user = $user;

		$string = explode("@",$user->email);

        // dd($string[1]);  

		$ingo_id = ingoOfficeUserDomain::check_domain($string[1]);


		$district_id = $request->district_id;

		$ingo_office = Ingos::where('id',$ingo_id)->first();

		$project_list = IngoProjects::where('ingo_office_id',$ingo_office->id)->get();

		$selected_project_id = "";

		$count = 1;

		foreach ($project_list as $project) {

			$district = ProjectDistrict::where('project_id',$project->id)->where('district_id',$district_id)->first();  


			if(is_object($district)){

				$selected_project_id[$count] = $district->project_id;


				$count++;

			}

		}

    // dd($selected_project_id);

		$districts = array();
		$upazilas = array();

		foreach ($selected_project_id as $projects) {

			$district_of_all_selected_projects = ProjectDistrict::where('project_id',$projects)->get();


			$district_names = "";

			foreach ($district_of_all_selected_projects as $dist_selected) {

				$project_district_name = District::where('id',$dist_selected->district_id)->first();

				$district_names = $district_names.$project_district_name->name.",";

			}

			$districts[$projects] = $district_names;

			$thanas_for_selected_projects = ProjectUpazila::where('project_id',$projects)->get();

			$thana_names = "";

			foreach ($thanas_for_selected_projects as $thana_selected) {

				$project_thana_name = Upazila::where('id',$thana_selected->upazila_id)->first();

				$thana_names = $thana_names.$project_thana_name->name.",";

			}

			$upazilas[$projects] = $thana_names;

		} 

    // dd($upazilas);


		$final_array = array();

		$count = 0;

		foreach ($selected_project_id as $projects) {

			$district_names = "";

			if(array_key_exists($projects,$districts)){
				$district_names = $districts[$projects];
			}

			$thana_names = "";

			if(array_key_exists($projects,$upazilas)){

				$thana_names = $upazilas[$projects];

			}

			$particular_project = IngoProjects::where('id',$projects)->first();

			$final_array[$count] = array(
				'project' => $particular_project,
				'district' => $district_names,
				'thana' => $thana_names,
			);

			$count++;
		}

		return $final_array;

	}



	public static function theme_search(Request $request, User $user){


		$user = $user;

		$string = explode("@",$user->email);  

		$ingo_id = ingoOfficeUserDomain::check_domain($string[1]);

		$theme = $request->theme;

		$ingo_office = Ingos::where('id',$ingo_id)->first();

		$project_list = 
		IngoProjects::where('ingo_office_id',$ingo_office->id)->where('theme',$theme)->get();

    //finding disticts
		$district_id = array();
		$thana_id = array();

		foreach ($project_list as $project) {

			$project_district_name = ProjectDistrict::where('project_id',$project->id)->get();

			$districts = "";

			foreach ($project_district_name as $district_name) {

				$dist = District::where('id',$district_name->district_id)->first();

				$districts = $districts.$dist->name.",";

			}

			$district_id[$project->id] = $districts;

			$project_thana_name = ProjectUpazila::where('project_id',$project->id)->get();

			$thana_names = "";

			foreach ($project_thana_name as $project_thana) {

				$thana = Upazila::where('id',$project_thana->upazila_id)->first();

				$thana_names = $thana_names.$thana->name.",";

			} 

			$thana_id[$project->id] = $thana_names;



		}

		$final_array = array();

		$count = 0;

		foreach ($project_list as $project) {

			$district_names = "";

			if(array_key_exists($project->id, $district_id)){
				$district_names = $district_id[$project->id];
			}

			$thana_names = "";

			if(array_key_exists($project->id,$thana_id)){

				$thana_names = $thana_id[$project->id];

			}

			$final_array[$count] = array(
				'project' => $project,
				'district' => $district_names,
				'thana' => $thana_names,
			);

			$count++;

		}

		return $final_array;
	}


}