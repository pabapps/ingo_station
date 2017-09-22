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

class MapRelated{


	public static function district_for_project(Request $request){
		
		$project_id = $request->project_id;

		$project_details = IngoProjects::where('id',$project_id)->first();

		$districts = ProjectDistrict::where('project_id',$project_id)->get();

		$district_array = array();
		$count = 0;

		foreach ($districts as $dist) {

			$district = District::where('id',$dist->district_id)->first();

			if($district->id == 45){
				$district_array[$count] = "Coxs_Bazar";
			}else{
				$district_array[$count] = $district->name;    
			}

			$count++;
		}

		$district_pack = array(
			'districts'=> $district_array,
			'project'=> $project_details,
		);

		return $district_pack;

	}

}