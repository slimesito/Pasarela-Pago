<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\DeudaEmpresaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum', 'is.admin'])->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // Rutas protegidas
    Route::prefix('deuda')->group(function () {
        Route::get('/consultar', [DeudaEmpresaController::class, 'consultarDeuda']);
        Route::post('/pagar', [DeudaEmpresaController::class, 'pagarDeuda']);
    });
});

