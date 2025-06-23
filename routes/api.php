<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PunchController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'show']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/punches', [PunchController::class, 'index']);
    Route::post('/punch', [PunchController::class, 'store']);
    Route::put('/punch/{punch}', [PunchController::class, 'update']);
    Route::delete('/punch/{punch}', [PunchController::class, 'destroy']);
});