<?php

namespace App\Http\Controllers;

use App\Exceptions\DatabaseConnectionException;
use App\Http\Controllers\Controller;

class ErrorController extends Controller
{
    public function databaseConnectionError(DatabaseConnectionException $exception)
    {
        return response()->view('errors.database', ['error' => $exception->getMessage()], 500);
    }
}