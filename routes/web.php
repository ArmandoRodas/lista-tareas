<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tareas', [TareaController::class, 'index'])->name('tareas.index');
Route::get('/tareas/crear', [TareaController::class, 'crear'])->name('tareas.crear');
Route::post('/tareas', [TareaController::class, 'guardar'])->name('tareas.guardar');
Route::get('/tareas/{id}/editar', [TareaController::class, 'editar'])->name('tareas.editar');
Route::post('/tareas/{id}', [TareaController::class, 'actualizar'])->name('tareas.actualizar');
Route::delete('/tareas/{id}', [TareaController::class, 'eliminar'])->name('tareas.eliminar');
Route::patch('/tareas/{id}/completar', [TareaController::class, 'completar'])->name('tareas.completar');
Route::patch('/tareas/{id}/favorita', [TareaController::class, 'favorita'])->name('tareas.favorita');
Route::patch('/tareas/{id}/deshabilitar', [TareaController::class, 'deshabilitar'])->name('tareas.deshabilitar');

