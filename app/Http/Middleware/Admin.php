<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if(auth()->user()->role == admin) {
            return $next($request);
        }
        return redirect('login')->with('error', 'Vous n\'etez pas autorisé a accéder a cette page.')

    }
}
