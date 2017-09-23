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

	/**
	 * gets the porject data and also the district associated with that particular district
	 */

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

            foreach ($district_id as $dist) {
                $district = District::where('id',$dist->district_id)->first();

                if($district->id == 45){
                    $district_array[$count] = "Coxs_Bazar";
                }else{
                    $district_array[$count] = $district->name;    
                }
                $count++;
            }
        }

        $district_name = array(
        	'districts'=> $district_array,
			'ingo_office'=> $ingo_office->about,
        );

        return $district_name;

	}






















}