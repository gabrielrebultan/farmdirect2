<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class unregisteredMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(Auth::check()){ //checks if user is unregistered
            foreach (Auth::user()->role as $role) {
                switch($role->name){                       //access level control
                    case 'System Personnel':
                        return redirect('/admin/home');
                        break;   
                    case 'Super Admin':
                        return redirect('/admin/home');
                        break;           
                    case 'Buyer':
                        return redirect('/buyer');
                        break;
                    case 'Farmer':
                        return redirect('/farmer'); 
                        break;
                
                }
            }
        }else{
            return $next($request);
        }


    }
}
