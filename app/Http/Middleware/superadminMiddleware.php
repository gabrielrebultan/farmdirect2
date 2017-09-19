<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class superadminMiddleware
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
            switch($role->name){                //access level control
                case 'Super Admin':
                    return $next($request);
                    break;
                case 'Buyer':
                    return redirect('/buyer');
                    break;
                case 'Farmer':
                    return redirect('/farmer'); 
                    break;
                case 'System Personnel':
                    return redirect('/admin/home'); 
                    break;  
            }
            
        }
        
    }
}
