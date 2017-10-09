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

//testing
use App\search\ProjectSearch;
use App\emailDomain\domain;

use App\ingoOfficeCode\IngoOfficeUserDomain;

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
        //for domain verify will be commented out for production purpose
        // domain::create_domain();

        $user = Auth::user();

        $string = explode("@",$user->email);

        // dd($string[1]);  

        $ingo_id = IngoOfficeUserDomain::check_domain($string[1]);


        $ingo = Ingos::where('id',$ingo_id)->first();


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



        $string = explode("@",$user->email);

        // dd($string[1]);  

        $ingo_id = ingoOfficeUserDomain::check_domain($string[1]);


        $old_ingo = Ingos::where('id',$ingo_id)->first();

        //checking if the ingo info for this user has already been entered or not
        //if so, just update the existing data
        //else, create new data

        // $old_ingo = Ingos::where('user_id',$user->id)->first();

        if(is_object($old_ingo)){

            Ingos::where('id',$old_ingo->id)
            ->update(['ingo_name'=>$request->ingo_name,'address'=>$request->ingo_address,'contact_number'=>$request->contact_number,'email'=>$request->ingo_email,'web_link'=>$request->web_link,'about'=>$request->about_org]);

        }else{


            // dd($request->ingo_email);

            $valid_domain = IngoController::domain_check($user->email,$request->ingo_email);

            if($valid_domain){
                $ingo = new Ingos;

                $ingo->user_id = $user->id;
                $ingo->ingo_name = $request->ingo_name;
                $ingo->address = $request->ingo_address;
                $ingo->contact_number = $request->contact_number;
                $ingo->email = $request->ingo_email;
                $ingo->web_link = $request->web_link;
                $ingo->valid = 1;
                $ingo->about = $request->about_org;

                $ingo->save();

                $request->session()->flash('alert-success', 'data has been successfully saved!');
            }else{
                $request->session()->flash('alert-success', 'Sorry the your ingo mail domain does not match with your email address domain!');
            }
            

        }



        
        return redirect()->action('IngoController@create'); 




    }

    /**
    checking the user domain with the domain of the new ingo that has been entered by the user.
    if the domain matches, returns true otherwise returns false
    **/

    private function domain_check($user_domain, $new_ingo_domain){

        $user_domain = explode("@",$user_domain);

        $new_ingo_domain = explode("@",$new_ingo_domain);

        if($new_ingo_domain[1] == $user_domain[1]){
            return true;
        }else{
            return false;
        }

    }

/**
 * search by district id
 */

public function get_project_by_district(Request $request){

    // dd("working on it");


    $user = Auth::user();

    $final_array = ProjectSearch::district_search($request,$user);


    return json_encode($final_array);
    
    

}

/**
 * search by theme
 */

public function get_project_by_theme(Request $request){

    $user = Auth::user();

    $final_array = ProjectSearch::theme_search($request,$user);

    return json_encode($final_array);

}

/**
 * trying to implement a different type of search 
 */

public function get_project_by_district_theme(Request $request){

    $user = Auth::user();

    $final_array = ProjectSearch::district_theme_search($request,$user);

    return json_encode($final_array);





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
