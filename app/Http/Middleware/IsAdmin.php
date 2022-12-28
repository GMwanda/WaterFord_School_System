<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth::check()) {

            if (Auth::user()->is_admin == 1) {
                return $next($request);
            }
            else if (Auth::user()->is_admin == 2) {
                return $next($request);
            }
            else if(Auth::user()->is_admin == 0){
                return $next($request);
            } else {
                return abort(403, 'Unauthorized Access');
            }
        } else {
            return redirect('/login')->with('message', 'YOU ARENT LOGGED IN!!');
        }
    }
}
