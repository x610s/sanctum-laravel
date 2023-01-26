<?php

use App\Http\Controllers\TransferenciaController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/transferencias', [TransferenciaController::class, 'index']);
    Route::post('/transferencias/add', [TransferenciaController::class, 'add']);
    Route::put('/transferencias', [TransferenciaController::class, 'update']);
    Route::delete('/transferencias/{id}', [TransferenciaController::class, 'destroy']);
});
