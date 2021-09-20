<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\ModulSiswa;
use App\Http\Controllers\ModulTagihan;
use App\Http\Controllers\Setting;

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

//router halaman login
Route::get('/', [Auth::class, 'index']);


//router group halaman admin
Route::prefix('admin')->group(function () {

    Route::get('dashboard', [Dashboard::class, 'index']);

    Route::prefix('modulsiswa')->group(function () {
    });

    Route::prefix('modultagihan')->group(function () {
    });

    Route::prefix('setting')->group(function () {
    });
});

//router group halaman siswa
Route::prefix('siswa')->group(function () {
});
