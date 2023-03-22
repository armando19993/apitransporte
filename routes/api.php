<?php

use App\Http\Controllers\ConductorController;
use App\Http\Controllers\ConsesionariaController;
use App\Http\Controllers\OperativoController;
use App\Http\Controllers\TransporteController;
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

Route::controller(ConductorController::class)->prefix('conductores')->group(function() {
    Route::get('/{idInspector}', 'index');
    Route::post('/', 'store');
    Route::get('show/{conductor}', 'show');
    Route::post('update/{conductor}', 'update');
    Route::post('delete/{conductor}', 'destroy');
});

Route::controller(ConsesionariaController::class)->prefix('consesionarias')->group(function() {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{consesionaria}', 'show');
    Route::post('update/{consesionaria}', 'update');
    Route::post('delete/{consesionaria}', 'destroy');
});

Route::controller(TransporteController::class)->prefix('transportes')->group(function() {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{transporte}', 'show');
    Route::post('update/{transporte}', 'update');
    Route::post('delete/{transporte}', 'destroy');
});

Route::controller(OperativoController::class)->prefix('operativos')->group(function() {
    Route::get('/{idInspector}', 'index');
    Route::post('/', 'store');
    Route::get('show/{operativo}', 'show');
    Route::post('update/{operativo}', 'update');
    Route::post('delete/{operativo}', 'destroy');
});
