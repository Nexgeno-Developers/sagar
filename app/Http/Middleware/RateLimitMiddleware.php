<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Cache\RateLimiter;

class RateLimitMiddleware
{
    protected $limiter;

    public function __construct(RateLimiter $limiter)
    {
        $this->limiter = $limiter;
    }

    public function handle($request, Closure $next)
    {

        if (app()->environment('local')) {
            return $next($request);
        }

        $key = $request->ip();
        $maxAttempts = 80; // Max requests allowed
        $decayMinutes = 1; // Time window in minutes

        // Get the User-Agent from the request
        $userAgent = $request->header('User-Agent');

        if ($this->limiter->tooManyAttempts($key, $maxAttempts)) {
            //return response()->json(['error' => 'Security:Too many requests detected!!'], 429);
            //return response()->view('errors.419', [], 419);

            // Log the blocked request
            Log::warning('Blocked request from RateLimit User-Agent: ' . $userAgent, [
                'ip' => $request->ip(),
                'url' => $request->fullUrl(),
                'method' => $request->method(),
            ]);

            return response('Security:Too many requests detected.', 429);
        }

        $this->limiter->hit($key, $decayMinutes * 60);

        return $next($request);
    }
}