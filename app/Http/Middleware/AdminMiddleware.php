<?php

namespace App\Http\Middleware;

use Closure; use Auth;

class AdminMiddleware
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
        if(Auth::user()->id != 1)
        {
            return redirect('/')->with('message','Вы не администратор!');
        }
        return $next($request);
    }
}
