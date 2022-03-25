<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LectorMiddleware
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
        if (session('tipo') == "REDACTOR" || session('tipo') == "LECTOR" || session('tipo') == "ADMIN") {
            return $next($request);
        }
        return redirect()->route('mi-cuenta');
    }
}
