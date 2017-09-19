<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class buyerMiddleware
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
        foreach (Auth::user()->role as $role) { //possbile improvement =case
            switch($role->name){ 
                case 'Buyer':
                    return $next($request);
                    break;               //access level control
                case 'Farmer':
                    return redirect('/farmer'); 
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
