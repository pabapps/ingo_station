<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\EmailDomain;
use Illuminate\Support\Str;
use Mail;
use App\Mail\Verify;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'verify_token' => Str::random(40),
        ]);
    }


     /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function register(Request $request)
     {
        $this->validator($request->all())->validate();

        $domain_exsit = RegisterController::domain_check($request);

        if($domain_exsit){
            event(new Registered($user = $this->create($request->all())));

            Mail::to(user->email)->send(new Verify);

            return redirect()->back();
        }else{
            //need to send a message that domain does not exist
            return redirect()->back();
        }

        

    }

    /*
    checking the domain of an incoming email address if the domain exist, new user is valid 
    if not the new user is invalid. 
    */
    private static function domain_check(Request $request){
        
        $email = $request->email;

        $string = explode("@",$email);

        $modified_email = $string[1];

        $database_domain = EmailDomain::where('domain_name',$modified_email)->first();

        if(is_object($database_domain)){
            return true;
        }else{
            return false;
        }




    }

}
