<?php

use App\Http\Controllers\ComprasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\VentasController;
use App\Models\Empleados;
use Illuminate\Support\Facades\Route;

// Login fuera del middleware para poder acceder e iniciar sesión
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'auth'])->name('login');

// Comprobar el inicio de sesión para poder acceder a las rutas de la app
Route::middleware(['verificar_usuario'])->group(function () {

    // Rutas para llamar a los métodos de los controladores
    // Home
    Route::get('/', [HomeController::class, 'index'])->name('home');
    // Cerrar sesión y salir del middleware
    Route::post('/logout', [HomeController::class, 'logout'])->name('logout');

    // Compras
    Route::get('/compras', [ComprasController::class, 'index'])->name('compras.index');

    // Empleados/Usuarios
    Route::get('/empleados', [EmpleadosController::class, 'index'])->name('empleados.index');
    Route::post('/empleados/añadir', [EmpleadosController::class, 'insert'])->name('empleados.insert');
    Route::post('/empleados/editar', [EmpleadosController::class, 'update'])->name('empleados.update');
    Route::post('/empleados/eliminar', [EmpleadosController::class, 'delete'])->name('empleados.delete');

    // Inventario
    Route::get('/inventario', [InventarioController::class, 'index'])->name('inventario.index');

    // Proveedores
    Route::get('/proveedores', [ProveedoresController::class, 'index'])->name('proveedores.index');

    // Tareas
    Route::get('/tareas', [TareasController::class, 'index'])->name('tareas.index');

    // Ventas
    Route::get('/ventas', [VentasController::class, 'index'])->name('ventas.index');

});