<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [UsuariosController::class, 'index'])->name('usuarios');
Route::post('/guardar', [UsuariosController::class, 'guardar'])->name('usuarios_guardar');
Route::post('/eliminar', [UsuariosController::class, 'eliminar'])->name('usuarios_eliminar');

/*Route::get('/', function () {
    return view('welcome');
});*/
