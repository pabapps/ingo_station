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
use Auth;
use Response;
use DB;

class IngoController extends Controller
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

        $ingo = Ingos::where('user_id',$user->id)->first();


        if(is_object($ingo)){

            $project_list = IngoProjects::where('ingo_office_id',$ingo->id)->get();
            if(sizeof($project_list)>0){

                $district_id = array();
                $thana = array();

                foreach ($project_list as $project) {

                    $district = ProjectDistrict::where('project_id',$project->id)->get();

                    $district_name = "";

                    foreach ($district as $dis) {

                        $project_district_name = District::where('id',$dis->district_id)->first();


                        $district_name = $district_name.$project_district_name->name.","; 
                    }

                    $upazila = ProjectUpazila::where('project_id',$project->id)->get();

                    $thana_name = "";

                    foreach ($upazila as $upa) {
                        
                        $project_thana_name = Upazila::where('id',$upa->upazila_id)->first();

                        $thana_name = $thana_name.$project_thana_name->name.",";
                    }

                    $district_id[$project->id] = $district_name;

                    $thana[$project->id] = $thana_name;
                }

                $final_array = array();

                $count = 1;

                foreach ($project_list as $project) {

                    $district_names = "";

                    if(array_key_exists($project->id,$district_id)){
                        $district_names = $district_id[$project->id];
                    }

                    $thana_names = "";

                    if(array_key_exists($project->id,$thana)){

                        $thana_names = $thana[$project->id];

                    }
                    
                    $final_array[$count] = array(
                        'project' => $project,
                        'district' => $district_names,
                        'thana' => $thana_names,
                        );

                    $count++;
                }

                return view('ingo.ingo_create')->with('ingo',$ingo)->with('final_array',$final_array);
                
            }else{
                return view('ingo.ingo_create')->with('ingo',$ingo);
            }

        }else{

            return view('ingo.ingo_create');
        }


        
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

        $user = Auth::user();

        //checking if the ingo info for this user has already been entered or not
        //if so, just update the existing data
        //else, create new data

        $old_ingo = Ingos::where('user_id',$user->id)->first();

        if(is_object($old_ingo)){

            Ingos::where('id',$old_ingo->id)
            ->update(['ingo_name'=>$request->ingo_name,'address'=>$request->ingo_address,'contact_number'=>$request->contact_number,'email'=>$request->ingo_email,'web_link'=>$request->web_link]);

        }else{

           $ingo = new Ingos;

           $ingo->user_id = $user->id;
           $ingo->ingo_name = $request->ingo_name;
           $ingo->address = $request->ingo_address;
           $ingo->contact_number = $request->contact_number;
           $ingo->email = $request->ingo_email;
           $ingo->web_link = $request->web_link;
           $ingo->valid = 1;

           $ingo->save();

       }



       $request->session()->flash('alert-success', 'data has been successfully saved!');
       return redirect()->action('IngoController@create'); 




   }

/**
 * search by district id
 */

public function get_project_by_district(Request $request){

    $user = Auth::user();

    $district_id = $request->district_id;

    $ingo_office = Ingos::where('user_id',$user->id)->first();

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

    dd($selected_project_id);

    

    
    

    // $projects = IngoProjects::where('');
    

}

public function maps(){

    // dd("testing");

    $response = \GoogleMaps::load('geocoding')
    ->setParam (['address' =>'santa cruz'])
    ->get();

    var_dump( json_decode( $response ) );

    // dd($response);

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
