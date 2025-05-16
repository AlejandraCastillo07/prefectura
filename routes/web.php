<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\PrefecturaController;
use App\Http\Controllers\UsuarioController;


Route::post('/logout', function () {
    Auth::logout();  // Cierra la sesión
    return redirect('/');  // Redirige al usuario a la página principal (o cualquier otra página que prefieras)
});



// Página principal
Route::get('/', [PrefecturaController::class, 'index'])->name('prefectura.index');

Route::middleware('auth')->group(function () {

// ---------------- RUTAS DE ASISTENCIAS ---------------- //

// Mostrar todas las asistencias

Route::get('/asistencias', [AsistenciaController::class, 'index'])->name('asistencias.index');

// Mostrar formulario de registro de asistencia con id de horario
Route::get('/asistencias/registrar/{horarioId}', [AsistenciaController::class, 'create'])->name('asistencias.create.horario');

// Guardar nueva asistencia
Route::post('/asistencias', [AsistenciaController::class, 'store'])->name('asistencias.store');

// Editar asistencia
Route::get('/asistencias/{id}/edit', [AsistenciaController::class, 'edit'])->name('asistencias.edit');

Route::patch('/asistencias/{id}', [AsistenciaController::class, 'update'])->name('asistencias.update');


// Ocultar asistencia (eliminación lógica)
Route::patch('/asistencias/{id}/ocultar', [AsistenciaController::class, 'ocultar'])->name('asistencias.ocultar');


// ---------------- RUTAS DE HORARIOS ---------------- //

Route::resource('horarios', HorarioController::class)->except(['edit']);
Route::get('horarios/{id}/edit', [HorarioController::class, 'edit'])->name('horarios.edit');
Route::patch('/horarios/{id}/ocultar', [HorarioController::class, 'ocultar'])->name('horarios.ocultar');


// ---------------- OPCIONAL: REGISTRO DE ASISTENCIAS ---------------- //

// Si usas otra tabla/modelo `registro_asistencias` diferente:
Route::resource('registro_asistencias', AsistenciaController::class);

Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/crear', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');

Route::get('/usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update');
Route::post('/usuarios/{usuario}/hide', [UsuarioController::class, 'hide'])->name('usuarios.hide'); // Ocultar

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
