<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;

class TrackUserActivity
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
        if (Auth::check()) {
            $expiresAt = now()->addMinutes(5); // Mantén el estado del usuario por 5 minutos
            Cache::put('user-is-online-' . Auth::id(), true, $expiresAt);
        }
        return $next($request);
    }
}
