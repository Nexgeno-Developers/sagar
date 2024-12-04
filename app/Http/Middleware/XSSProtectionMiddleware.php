<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use HTMLPurifier;
use HTMLPurifier_Config;

class XSSProtectionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $input = $request->all();


        // Create a new purifier instance
        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);


        // Sanitize input while allowing safe HTML
        $sanitizedInput = array_map(function ($value) use ($purifier) {
            return is_string($value) ? $purifier->purify($value) : $value;
        }, $input);
        $request->merge($sanitizedInput);
        return $next($request);
    }
}