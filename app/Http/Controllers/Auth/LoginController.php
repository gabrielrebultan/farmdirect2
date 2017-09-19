<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/homepage';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)//kelangang ioverride para maredirect sa tamang homepage.
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);    

        foreach($this->guard()->user()->role as $role){  //redirect the user depending on the role
            switch($role->name){
                case 'Buyer':
                    return redirect()->route('buyer.homepage');
                    break;
                case 'Farmer':
                    return redirect()->route('farmer.homepage');
                    break;
                case 'System Personnel':
                    return redirect()->route('systempersonnel.homepage');
                    break;
                case 'Super Admin':
                    return redirect()->route('superadmin.homepage');
                    break;
            }
            
        }
    }

      /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    
    
}
