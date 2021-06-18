<?php

namespace App\Http\Middleware;

use Closure;

class Library
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
        if (Auth::user()){
            $user_role = $request->user()->role;
            $segment_one = $request->segment(1);
            $redirect = false;
                switch ($user_role) {
                    case 1:
                    case 2:
                        $redirect = true;
                        break;
                }
                if($redirect){
                   return $next($request); 
                } else{   
                    return redirect('/home');
                }
        } 
        else{   
            return redirect('/');
        }
    }
}
