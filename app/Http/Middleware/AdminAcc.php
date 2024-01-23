<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAcc
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
        // if(Auth::check()) {

        //     // admin role = 2
        //     // user role = 1

        //     if(Auth::user()->role_id == 2){
        //         return redirect('/admin')->with('message','You are Admin, Welcome');
        //     } else {
        //         return redirect('/home')->with('message','Access Denied, you are not admin!');
        //     }
        // } else {
        //     return redirect('/login')->with('message','Login to access admin!');
        // }

        if(!auth()->check() || auth()->user()->role_id != 2){
            // abort(403);
            return redirect('/login')->with('message','Login to access admin!');
        }
        return $next($request);

    }
}
