<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user() || ! $request->user()->isAdmin) {
            return response()->json([
                'message' => 'Acceso denegado. Solo administradores pueden realizar esta acción.'
            ], 403);
        }

        return $next($request);
    }
}
