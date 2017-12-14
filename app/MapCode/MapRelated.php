<?php

namespace App\MapCode;

use Illuminate\Http\Request;
use App\User;
use App\Ingos;
use App\IngoProjects;
use App\ProjectDistrict;
use App\ProjectUpazila;
use App\District;
use App\Upazila;
use DB;

class MapRelated{

	/**
	 * gets the porject data and also the district associated with that particular district
	 */

	public static function district_for_project(Request $request){
		
		$project_id = $request->project_id;

		$project_details = IngoProjects::where('id',$project_id)->first();

		$districts = ProjectDistrict::where('project_id',$project_id)->get();

		$district_array = array();
		$count = 0;

		$modify_array = MapRelated::create_district_array($district_array,$districts,$count);

		$district_array = $modify_array['district'];
		$count = $modify_array['count'];


		$district_pack = array(
			'districts'=> $district_array,
			'project'=> $project_details,
		);

		return $district_pack;

	}

	/**
	 * gets the ingo information and the distrcts where this partical ingo is working
	 */
	
	public static function get_district_for_ingo(Request $request){

		$ingo_id = $request->ingo_id;

		//get the ingo information
		$ingo_office = Ingos::where('id',$ingo_id)->first();

        //get all the projecs under this ingo
		$projects = IngoProjects::where('ingo_office_id',$ingo_id)->where('valid',1)->get();
        //get all the district fron the above selected projects`
		$district_array = array();

		
		$count = 0;

		foreach ($projects as $pro) {
			$district_id = ProjectDistrict::where('project_id',$pro->id)->get();

			$modify_array = MapRelated::create_district_array($district_array,$district_id,$count);

			$district_array = $modify_array['district'];

			$count = $modify_array['count'];
		}

		// dd($ingo_office->id);

		$query_projects= "
		SELECT ingo_projects.id , ingo_projects.project_name AS text
		FROM ingo_projects WHERE ingo_projects.ingo_office_id = '$ingo_office->id' ORDER BY ingo_projects.project_name";

		$projects = DB::select($query_projects);

		// dd($projects);

		$district_name = array(
			'districts'=> $district_array,
			'ingo_office'=> $ingo_office->about,
			'projects'=>$projects
		);

		return $district_name;

	}



	public static function get_district_by_theme(Request $request){


		$theme = $request->theme_id;

        //get all the projects that are under this theme

		$projects = "";
		if(!empty($request->ingo_id)){

			$ingo_id = $request->ingo_id;

			$projects = DB::table('ingo_projects')->where('ingo_office_id',$ingo_id)->where('theme','like','%'.$theme.'%')->get();
		}else{

			$projects = DB::table('ingo_projects')->where('theme','like','%'.$theme.'%')->get();

		}

		

		$district_array = array();

		$count = 0;

		$project_name = array();

		$project_counter = 0;

		$project_district_names = array();

		$project_district_count = 0;

		foreach ($projects as $proc) {
			$project_name[$project_counter] = $proc->project_name;

			$project_counter++;
		}

		foreach ($projects as $proc) {
			$district_id = ProjectDistrict::where('project_id',$proc->id)->get();

			$modify_array = MapRelated::create_district_array($district_array,$district_id,$count);

			$district_string = "";

			foreach ($district_id as $dist) {
				
				$actual_district = District::where('id',$dist->district_id)->first();

				$district_string = $district_string.$actual_district->name.', ';
				
			}

			$project_district_names[$project_district_count] = $district_string;

			$project_district_count++;

			$district_array = $modify_array['district'];
			$count = $modify_array['count'];

		}

		

		$district_name = array(
			'districts'=> $district_array,
			'project_name'=> $project_name,
			'project_district'=>$project_district_names,
		);
		
		

		return $district_name;


	}


	


	private static function create_district_array($district_array,$district_id,$count){

		foreach ($district_id as $dist) {

			$district_data = District::where('id',$dist->district_id)->first();

			if($district_data->id == 45){
				$district_array[$count] = "Coxs_Bazar";
			}else{
				$district_array[$count] = $district_data->name;    
			}
			$count++;

		}

		$modify_array = array(
			'district'=>$district_array,
			'count'=>$count,
		);

		return $modify_array;

	}














}