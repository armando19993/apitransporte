<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(UserController::class)->prefix('auth')->group(function() {
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::controller(UserController::class)->prefix('users')->group(function() {
    Route::get('getInspectores/{idAdministrador}', 'getInspectores');
    Route::post('updateUser/{user}', 'updateUser');
    Route::post('updateContrasena/{user}', 'updateContrasena');
    Route::post('deleteInspector/{inspector}', 'deleteInspector');
});
