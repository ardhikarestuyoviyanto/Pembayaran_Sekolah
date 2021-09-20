<?php

use Illuminate\Support\Facades\Route;
// use Modules\Kelas\Http\Controllers\KelasController;

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


Route::prefix('admin')->group(function () {

    Route::prefix('modulsiswa')->group(function () {
        Route::resource('kelas', KelasController::class);
    });
});
