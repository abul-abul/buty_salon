<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       if (!Auth::check())
       {
           if ($request->ajax())
           {
               return response('Unauthorized.', 401);
           }
           else
           {
               return redirect()->guest('am/admin/login');
           }        
       }
       else 
       {
           if (Auth::user()->role != "main-admin")
           {
               if ($request->ajax())
               {
                   return response('Unauthorized.', 401);
               }
               else
               {
                   return redirect()->guest('am/admin/login');
               }
           }
       }
       return $next($request);
    }
}
