<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingos;
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
        return view('ingo.ingo_create');
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

        $ingo = new Ingos;

        $ingo->user_id = $user->id;
        $ingo->ingo_name = $request->ingo_name;
        $ingo->address = $request->ingo_address;
        $ingo->contact_number = $request->contact_number;
        $ingo->email = $request->ingo_email;
        $ingo->web_link = $request->web_link;
        $ingo->valid = 1;

        $ingo->save();

        $request->session()->flash('alert-success', 'data has been successfully saved!');
        return redirect()->action('IngoController@create'); 




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
