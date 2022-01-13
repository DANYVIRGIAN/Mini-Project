<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatawargaController;
use App\Http\Controllers\DatarumahController;
use App\Http\Controllers\iuranController;
use App\Http\Controllers\pengeluaranController;
use App\Http\Controllers\adminController;

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
    return view('login');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/admin', adminController::class)->except('show','edit','update')->middleware('auth');
Route::resource('/datawarga', DatawargaController::class)->middleware('auth');
Route::resource('/datarumah', DatarumahController::class)->middleware('auth');
Route::resource('/iuran', iuranController::class)->except('show','edit','update')->middleware('auth');
Route::resource('/pengeluaran', pengeluaranController::class)->except('show','edit','update')->middleware('auth');


// Route::get('/penghuni', [DatarumahController::class, 'penghuni'])->middleware('auth');
// Route::post('/penghuni', [DatarumahController::class, 'store_penghuni'])->middleware('auth');
