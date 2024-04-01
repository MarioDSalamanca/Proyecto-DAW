<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Empleados\UsuariosController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [LoginController::class, 'showLogin']);
Route::post('/login', [LoginController::class, 'auth']);

//Route::middleware(['web', 'verificar_usuario'])->group(function () {
    // Rutas para llamar a los métodos del controlador UsuariosController
    Route::resource('empleados', UsuariosController::class, (
        ['index', 'store', 'update', 'destroy']
    ));
//});