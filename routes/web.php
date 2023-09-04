<?php

use App\Http\Controllers\MedicosController;
use App\Http\Controllers\EspecialidadesController;
use App\Http\Controllers\MedicosEspecialidadesController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('principal');
});

Route::get('/especialidades',[EspecialidadesController::class, 'index'])->name('especialidades');
Route::post('/especialidades/criar',[EspecialidadesController::class, 'create'])->name('especialidades.criar');
Route::post('/especialidades/salvar',[EspecialidadesController::class, 'store'])->name('especialidades.salvar');
Route::put('/especialidades/alterar',[EspecialidadesController::class, 'update'])->name('especialidades.alterar');
Route::delete('/especialidades/delete/{id}',[EspecialidadesController::class, 'destroy'])->name('especialidades.delete');
Route::post('/especialidades/search',[EspecialidadesController::class, 'search'])->name('especialidades.search');

Route::get('/medicos',[MedicosController::class, 'index'])->name('medicos');
Route::get('/medicos/criar',[MedicosController::class, 'create'])->name('medicos.criar');
Route::post('/medicos/salvar',[MedicosController::class, 'store'])->name('medicos.salvar');
Route::put('/medicos/alterar',[MedicosController::class, 'update'])->name('medicos.alterar');
Route::delete('/medicos/delete/{id}',[MedicosController::class, 'destroy'])->name('medicos.delete');
Route::post('/medicos/search',[MedicosController::class, 'search'])->name('medicos.search');

Route::get('/relatorio',[MedicosEspecialidadesController::class, 'index'])->name('relatorio');
Route::post('/relatorio/search',[MedicosEspecialidadesController::class, 'search'])->name('relatorio.search');