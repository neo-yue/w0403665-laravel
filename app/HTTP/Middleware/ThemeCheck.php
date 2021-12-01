<?php

namespace App\HTTP\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;

class ThemeCheck
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
        $roles=$request->user()->roles;

        foreach($roles as $role){
            if($role->id!=3){
                return redirect::back()->with('message','Denied-You do not have permissions to access Theme Management');

            }

        }



        return $next($request);
    }
}
