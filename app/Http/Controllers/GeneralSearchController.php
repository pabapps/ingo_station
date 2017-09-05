<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralSearchController extends Controller
{
    
	public function general_search(){

		return view('GeneralSearch.search'); 

	}	


}
