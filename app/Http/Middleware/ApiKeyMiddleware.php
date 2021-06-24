<?php

namespace App\Http\Middleware;

use App\Models\ApiAkses;
use Closure;
use Illuminate\Http\Request;

class ApiKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->bearerToken()){
            if(ApiAkses::where('app_key',$request->bearerToken())->first()){
                return $next($request);
            }
        }

        if($request->has('api-key')){
            if(ApiAkses::where('app_key',$request->input('api-key'))->first()){
                return $next($request);
            }
        }

        return response('Unauthorized.', 401);
    }
}
