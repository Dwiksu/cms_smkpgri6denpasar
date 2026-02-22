<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DesktopOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $agent = strtolower($request->header('User-Agent'));

        // Deteksi device mobile
        $isMobile = preg_match('/mobile|android|iphone|ipad|ipod/i', $agent);

        if ($isMobile) {
            abort(404);
        }

        return $next($request);
    }
}