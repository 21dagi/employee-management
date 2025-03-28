<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CSPMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        
        // Basic policy that should work for most pages
        $policy = [
            "default-src 'self'",
            "script-src 'self' 'unsafe-inline' https:",
            "style-src 'self' 'unsafe-inline' https:",
            "img-src 'self' data: https:",
            "font-src 'self' https:",
            "connect-src 'self'",
            "media-src 'self'",
            "object-src 'none'",
            "frame-src 'self'",
            "form-action 'self'",
            "base-uri 'self'"
        ];

        // Admin-specific restrictions (stricter)
        if ($request->is('admin/*')) {
            $policy = array_merge($policy, [
                "script-src 'self'",
                "style-src 'self'",
                "frame-src 'none'"
            ]);
        }

        // Reporting in development
        if (app()->environment('local')) {
            $policy[] = "report-uri ".url('/csp-reports');
            $policy[] = "report-to default";
        }

        $response->header('Content-Security-Policy', implode('; ', $policy));
        
        return $response;
    }
}