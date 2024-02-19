<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\data_kondisiController;
use App\Http\Controllers\data_mobilController;
use App\Http\Controllers\data_userController;
use App\Http\Controllers\data_rekeningController;
use App\Http\Controllers\data_servisController;
use App\Http\Controllers\data_sewaController;
use App\Http\Controllers\data_customerController;
use App\Http\Controllers\AuthController;

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

// LOGIN
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/', [AuthController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::middleware(['akses:admin,owner'])->group(function () {
        // DATA USER
        Route::get('data-user', [data_userController::class, 'index']);

        // DATA KONDISI
        Route::get('data-kondisi', [data_kondisiController::class, 'index']);
        Route::get('data-kondisi/detail/{id}', [data_kondisiController::class, 'show']);
        Route::post('data-kondisi/simpan', [data_kondisiController::class, 'store']);
        Route::get('data-kondisi/edit/{id}', [data_kondisiController::class, 'edit']);
        Route::post('data-kondisi/edit/simpan', [data_kondisiController::class, 'update']);
        Route::delete('data-kondisi/hapus', [data_kondisiController::class, 'destroy']);

        // DATA SEWA MOBIL
        Route::get('data-sewa', [data_sewaController::class, 'index']);
        Route::get('data-sewa/detail/{id}', [data_sewaController::class, 'show']);
        Route::get('data-sewa/edit/{id}', [data_sewaController::class, 'edit']);
        Route::post('data-sewa/simpan', [data_sewaController::class, 'store']);
        Route::post('data-sewa/edit/simpan', [data_sewaController::class, 'update']);
        Route::delete('data-sewa/hapus', [data_sewaController::class, 'destroy']);

        // DATA REKENING
        Route::get('data-rekening', [data_rekeningController::class, 'index']);
        Route::get('data-rekening/detail/{id}', [data_rekeningController::class, 'show']);
        Route::get('data-rekening/edit/{id}', [data_rekeningController::class, 'edit']);
        Route::post('data-rekening/simpan', [data_rekeningController::class, 'store']);
        Route::post('data-rekening/edit/simpan', [data_rekeningController::class, 'update']);
        Route::delete('data-rekening/hapus', [data_rekeningController::class, 'destroy']);

        // DATA SERVIS
        Route::get('data-servis', [data_servisController::class, 'index']);
        Route::get('data-servis/detail/{id}', [data_servisController::class, 'show']);
        Route::get('data-servis/edit/{id}', [data_servisController::class, 'edit']);
        Route::post('data-servis/simpan', [data_servisController::class, 'store']);
        Route::post('data-servis/edit/simpan', [data_servisController::class, 'update']);
        Route::delete('data-servis/hapus', [data_servisController::class, 'destroy']);

        // DATA CUSTOMER
        Route::get('data-customer', [data_customerController::class, 'index']);
        Route::get('data-customer/detail/{id}', [data_customerController::class, 'show']);
        Route::get('data-customer/edit/{id}', [data_customerController::class, 'edit']);
        Route::post('data-customer/simpan', [data_customerController::class, 'store']);
        Route::post('data-customer/edit/simpan', [data_customerController::class, 'update']);
        Route::delete('data-customer/hapus', [data_customerController::class, 'destroy']);
    });

    Route::middleware(['akses:admin,owner,customer'])->group(function () {
        // DATA MOBIL
        Route::get('data-mobil', [data_mobilController::class, 'index']);
        Route::get('data-mobil/detail/{id}', [data_mobilController::class, 'show']);
        Route::get('data-mobil/edit/{id}', [data_mobilController::class, 'edit']);
        Route::post('data-mobil/simpan', [data_mobilController::class, 'store']);
        Route::post('data-mobil/edit/simpan', [data_mobilController::class, 'update']);
        Route::delete('data-mobil/hapus', [data_mobilController::class, 'destroy']);
    });

    Route::get('/logout', [AuthController::class, 'logout']);
});
