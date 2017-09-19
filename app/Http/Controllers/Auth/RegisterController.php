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
     //redirects the user depending on their usertype
    protected $redirectTo='/fd-registration-requirements';
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
            'userType' => 'required|string',
            'fname' => 'required|string|max:50',
            'middleinitial' => 'required|string|max:1',
            'lname' => 'required|string|max:50',
            'email' => 'required|string|email|max:100|unique:users',
            'contactno' => 'required|string|max:12',
            'password' => 'required|string|min:6|confirmed',
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
        // return User::create([
        //     'type' => $data['userType'],
        //     'fname' => ucfirst($data['fname']),
        //     'middleinitial' =>  ucfirst($data['middleinitial']),
        //     'lname' =>  ucfirst($data['lname']),
        //     'email' => $data['email'],
        //     'contactno' => $data['contactno'],
        //     'password' => bcrypt($data['password']),
        // ]);

        $user=new User;
        $user->type = $data['userType'];
        $user->fname = ucfirst($data['fname']);
        $user->middleinitial =  ucfirst($data['middleinitial']);
        $user->lname =  ucfirst($data['lname']);
        $user->email = $data['email'];
        $user->contactno = $data['contactno'];
        $user->password = bcrypt($data['password']);
        $user->activated = 0;
        $user->premium = 0;
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
        if($request->userType == 'Farmer'){
            $userRoleid=1;
        }elseif($request->userType == 'Buyer'){
            $userRoleid=2;
        }elseif($request->userType == 'System Personnel'){ 
             $userRoleid=3;
        }
        
        event(new Registered($user = $this->create($request->all()))); 

        //$this->guard()->login($user); //logging the user in

        $uid = $user->id; //getting the id of the newly registered account

         //entering the new value for role_users along user registration
        $this->createRolePivot($uid,$userRoleid);

        return redirect('/fd-registration-requirements');
        
    }

    
}
