<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\role_users;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class adminRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | System Personnel Register Controller
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
     //redirects the user depending on their usertype
    protected $redirectTo='/fd-registration-requirements';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('superadmin');
    }
    public function registrationForm(){

        return view('auth.syspersonnelregister');
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
            'userType' => 'required|string',
            'fname' => 'required|string|max:50',
            'middleinitial' => 'required|string|max:1',
            'lname' => 'required|string|max:50',
            'email' => 'required|string|email|max:100|unique:users',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user=new User;
        $user->type = $data['userType'];
        $user->fname = ucfirst($data['fname']);
        $user->middleinitial =  ucfirst($data['middleinitial']);
        $user->lname =  ucfirst($data['lname']);
        $user->email = $data['email'];
        $user->contactno = $data['contactno'];
        $user->password = bcrypt($data['password']);
        $user->activated = 1;
        $user->premium = 1;
        $user->save();
        
        return $user;
    }

    protected function createRolePivot($id,$roleid)  //para maglalagyan yung role_table kapag nagregister
    {
        $role=new role_users;
        $role->user_id = $id;
        $role->role_id = $roleid;
        $role->save();
        
        return $role;
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

        //getting the user type to identify role id fo adding  data to role_user after registering
        $userRoleid=0;

        if($request->userType == 'System Personnel'){ 
             $userRoleid=3;
        }
        
        event(new Registered($user = $this->create($request->all()))); 

        //$this->guard()->login($user); //logging the user in

        $uid = $user->id; //getting the id of the newly registered account

         //entering the new value for role_users along user registration
        $this->createRolePivot($uid,$userRoleid);

        session()->flash('message','System Personnel Successfuly Registered.');

        return redirect('/fd-sAdmin');
        
    }

    
}
