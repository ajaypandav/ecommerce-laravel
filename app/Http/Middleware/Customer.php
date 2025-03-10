<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class customer
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
        if (!Session::has('customerLogin')) {
            return redirect('login');
        }
        return $next($request);
    }
}
