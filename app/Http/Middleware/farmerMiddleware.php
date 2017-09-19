<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class farmerMiddleware
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
        foreach (Auth::user()->role as $role) {
             switch($role->name){  
                 case 'Farmer':
                    return $next($request);
                    break;                      //access level control
                case 'Buyer':
                    return redirect('/buyer');
                    break;                 
                case 'System Personnel':
                    return redirect('/admin/home'); 
                    break;              
                case 'Super Admin':
                    return redirect('/fd-sAdmin');
                    break;
            }
        }

        
    }
}
