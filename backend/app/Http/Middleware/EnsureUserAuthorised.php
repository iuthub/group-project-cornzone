<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;

class EnsureUserAuthorised
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
        if (session()->get("studentId") == null && session()->get("teacherId") == null) {
            return Redirect::to('/');
        }
        return $next($request);
    }
}
