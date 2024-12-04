<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SQLInjectionMiddleware
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
        foreach ($request->all() as $input) {
            if (is_string($input) && preg_match('/(select|insert|delete|drop|update|union|exec|--)|\*|;/i', $input)) {
                return response('Security:Invalid input detected.', 403);
            }
        }

        return $next($request);
    }
}