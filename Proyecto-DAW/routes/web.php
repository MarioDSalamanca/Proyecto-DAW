<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Empleados\UsuariosController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'auth'])->name('login');

Route::middleware(['verificar_usuario'])->group(function () {
    // Rutas para llamar a los métodos del controlador UsuariosController
    Route::resource('empleados', UsuariosController::class, (
        ['index']
    ));
    Route::post('/logout', [UsuariosController::class, 'logout'])->name('logout');
});