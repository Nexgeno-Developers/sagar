<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class BlockCurlWgetMiddleware
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
        $userAgent = $request->header('User-Agent');

        // Check if the User-Agent matches curl or wget
        if (str_contains(strtolower($userAgent), 'curl') || str_contains(strtolower($userAgent), 'wget')) {

            // Log the blocked request
            Log::warning('Blocked request from User-Agent: ' . $userAgent, [
                'ip' => $request->ip(),
                'url' => $request->fullUrl(),
                'method' => $request->method(),
            ]);

            // Return a 403 Forbidden response
            return response()->json(['message' => 'Access Denied'], 403);
        }

        return $next($request);
    }
}