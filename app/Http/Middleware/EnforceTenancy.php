<?php

namespace App\Http\Middleware;

use Closure;
use Stancl\Tenancy\Middleware\InitializeTenancyByRequestData;


class EnforceTenancy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if(session('x-tenant')) {
            $request->headers->set('X-Tenant', session('x-tenant'));
        }

        InitializeTenancyByRequestData::$onFail = function ($exception, $request, $next) {
            return redirect()->route('login');
        };

        return $next($request);


    }
}
