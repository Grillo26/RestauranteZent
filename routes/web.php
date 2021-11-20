<?php

use App\Http\Livewire\Clientes;
use App\Http\Livewire\Insumo;
use App\Http\Livewire\Personal;
use App\Http\Livewire\Proveedor;
use App\Http\Livewire\Turno;
use App\Http\Livewire\TipoPersonal;
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
    return view('welcome');
});

/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
   Route::get('/clientes', Clientes::class);
   Route::get('/dashboard', function () {
       return view('dashboard');;
   })->name('dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/proveedor', Proveedor::class);
    Route::get('/dashboard', function () {
        return view('dashboard');;
    })->name('dashboard');
 });

 Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/insumo', Insumo::class);
    Route::get('/dashboard', function () {
        return view('dashboard');;
    })->name('dashboard');
 });

 Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/personal', Personal::class);
    Route::get('/dashboard', function () {
        return view('dashboard');;
    })->name('dashboard');
 });

 Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/turno', Turno::class);
    Route::get('/dashboard', function () {
        return view('dashboard');;
    })->name('dashboard');
 });

 Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/tipoPersonal', TipoPersonal::class);
    Route::get('/dashboard', function () {
        return view('dashboard');;
    })->name('dashboard');
 });