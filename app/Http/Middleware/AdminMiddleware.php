<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->role === 'admin') {
                return $next($request);
            } else {
                \Log::info('Usuario no es admin, rol: ' . Auth::user()->role);
            }
        } else {
            \Log::info('Usuario no está autenticado');
        }

        return redirect('/')->with('error', 'No tienes permiso para acceder a esta sección.');
    }
}
