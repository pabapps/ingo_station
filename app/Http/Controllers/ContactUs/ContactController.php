<?php

namespace App\Http\Controllers\ContactUs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContactUs;
use Mail;
use App\Mail\mailContact;
use App\User;
use Validator;
use Response;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view("contact.contact");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $user =  User::where('email', 'raihan.zaman@practicalaction.org.bd')->first();

        $contactUs = new ContactUs;

        $contactUs->name = $request->name;
        $contactUs->email = $request->email;
        $contactUs->description = $request->description;

        $contactUs->save();

        // Mail::to("raihan.zaman@practicalaction.org.bd")->send(new mailContact($contactUs));
        Mail::to("raihan.zaman@practicalaction.org.bd")->cc("Syed.Mahmud@practicalaction.org.bd")->send(new mailContact($contactUs));

        dd("done");
    }




    public function test_get(){
        return response()->json([
            'name' => 'Abigail',
            'state' => 'CA'
        ]);
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
