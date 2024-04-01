<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Verifica si el usuario está autenticado y tiene el rol necesario
        if ($request->user() && in_array($request->user()->role, $roles)) {
            return $next($request);
        }

        // Si el usuario no tiene el rol necesario, puedes redirigirlo, mostrar un mensaje de error, o hacer lo que necesites.
        abort(403, 'No tienes permisos para acceder a esta página.');
    }
}
