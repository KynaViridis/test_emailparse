<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\AuthController;

Route::post('register', [AuthController::class, 'register'])->name('api.register');
Route::post('login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:api')->group(function () {
    Route::post('/emails', [EmailController::class, 'store']);
    Route::get('/emails/{id}', [EmailController::class, 'show']);
    Route::put('/emails/{id}', [EmailController::class, 'update']);
    Route::delete('/emails/{id}', [EmailController::class, 'destroy']);
    Route::get('/emails', [EmailController::class, 'index']);
});
