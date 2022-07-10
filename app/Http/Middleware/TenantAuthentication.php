<?php

namespace App\Http\Middleware;

use App\Models\Tenant;
use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class TenantAuthentication
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
        $origin = $request->headers->get('origin');
        $tenant = Tenant::where('url',$origin)->first();
        if(is_null($tenant)){
            throw new AuthorizationException('Not allowed to use this API',403);
        }else{
            app()->bind('tenant',function () use ($tenant){
                return $tenant;
            });
        }
        return $next($request);
    }
}
