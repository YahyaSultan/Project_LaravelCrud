<?php

namespace App\Http\Middleware;

use Closure;

class UserSession
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

        if(!$request->session()->exists('user_id')){
            return redirect()->route('user.login');
        }
        return $next($request);
    }
}
