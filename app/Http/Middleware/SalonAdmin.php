<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SalonAdmin
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
			   return redirect()->guest('am/salon/login');
		   }        
	   }
	   else 
	   {
		   if (Auth::user()->role != 'salon_admin')
		   {
			   if ($request->ajax())
			   {
				   return response('Unauthorized.', 401);
			   }
			   else
			   {
				   return redirect()->guest('am/salon/login');
			   }
		   }
	   }
	   return $next($request);
	}
}
