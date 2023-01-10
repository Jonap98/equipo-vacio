<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\etiquetas\EtiquetasController;
use App\Http\Controllers\empaques\EmpaquesController;

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
use App\Http\Controllers\barcode\BarcodeController;

Route::get('/barcode', [BarcodeController::class, 'index']);
// Etiquetas
Route::get('/', [EtiquetasController::class, 'index'])->name('etiquetas');

// Empaques
Route::get('empaques', [EmpaquesController::class, 'index'])->name('empaques');
Route::post('empaques/store', [EmpaquesController::class, 'store'])->name('empaques.store');


