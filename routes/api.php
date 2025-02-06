<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ClientHistoryController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('clients', ClientController::class);
    Route::apiResource('services', ServiceController::class);
    Route::apiResource('employees', EmployeeController::class);
    Route::apiResource('inventories', InventoryController::class);
    Route::apiResource('client-histories', ClientHistoryController::class);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/reservations', [ReservationController::class, 'index']);
    Route::post('/reservations', [ReservationController::class, 'store']);
    Route::get('/reservations/{id}', [ReservationController::class, 'show']);
    Route::put('/reservations/{id}', [ReservationController::class, 'update']);
    Route::delete('/reservations/{id}', [ReservationController::class, 'destroy']);
});

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('holamon', function () {
    return 'Hola Mon!';
});
