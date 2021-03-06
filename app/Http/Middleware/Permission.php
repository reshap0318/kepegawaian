<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class Permission
{
    public function handle(Request $request, Closure $next, $guards=null)
    {
        if($guards){
            if (!Gate::allows($guards)) {
                return abort(401);
            }
        }
        return $next($request);
    }
}
