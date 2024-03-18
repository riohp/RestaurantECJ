<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use App\Exceptions\DatabaseConnectionException;
use Illuminate\Support\Facades\Log;

class CheckDatabaseConnection
{
    public function handle($request, Closure $next)
    {
        try {
            // verifico conexión a la base de datos
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            Log::error('¡Ups! Algo salió mal :(' . $e->getMessage());
            throw new DatabaseConnectionException('Error al conectarse a la base de datos', $e->getCode(), $e);
        }

        return $next($request);
    }
}