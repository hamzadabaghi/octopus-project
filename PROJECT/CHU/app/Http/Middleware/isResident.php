<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class isResident
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
        if(Auth::User()->email == 'residentCHU@gmail.com')
            return $next($request);
        return redirect()->back();
    }
}
