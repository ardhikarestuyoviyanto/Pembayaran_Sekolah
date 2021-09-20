<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\ModulSiswa;
use App\Http\Controllers\ModulTagihan;
use App\Http\Controllers\Setting;
use App\Http\Controllers\Siswa;

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

Route::prefix('auth')->group(function () {
    Route::post('proseslogin', [Auth::class, 'proseslogin']);
    Route::get('logout', [Auth::class, 'logout']);
});

//router group halaman admin
Route::prefix('admin')->group(function () {

    Route::get('dashboard', [Dashboard::class, 'index'])->middleware('usersession');

    Route::prefix('modulsiswa')->group(function () {
    });

    Route::prefix('modultagihan')->group(function () {
        
        Route::get('pembayaran', [ModulTagihan::class, 'pembayaran'])->middleware('usersession');
        Route::post('insertpembayaran', [ModulTagihan::class, 'insertpembayaran'])->middleware('usersession');
        Route::post('getpembayaranbyid', [ModulTagihan::class, 'getpembayaranbyid'])->middleware('usersession');
        Route::post('updatepembayaran', [ModulTagihan::class, 'updatepembayaran'])->middleware('usersession');
        Route::post('deletepembayaran', [ModulTagihan::class, 'deletepembayaran'])->middleware('usersession');
        //-----------------------------------------------------------------------------
        Route::get('setting/{id}', [ModulTagihan::class, 'setting'])->middleware('usersession');
        Route::get('add/{id}', [ModulTagihan::class, 'addtagihan'])->middleware('usersession');
        Route::post('inserttagihan', [ModulTagihan::class, 'inserttagihan'])->middleware('usersession');
        Route::post('deletetagihan', [ModulTagihan::class, 'deletetagihan'])->middleware('usersession');
        //----------------------------------------------------------------------------

        Route::get('datatagihan', [ModulTagihan::class, 'datatagihan'])->middleware('usersession');
        Route::get('detailtagihan/{id}', [ModulTagihan::class, 'detailtagihan'])->middleware('usersession');

    });

    Route::get('setting', [Setting::class, 'index'])->middleware('usersession');
    Route::post('setting/updateadmin', [Setting::class, 'updateadmin'])->middleware('usersession');
    Route::post('setting/updatemidtrans', [Setting::class, 'updatemidtrans'])->middleware('usersession');

});

//router group halaman siswa
Route::prefix('siswa')->group(function () {
    
    Route::get('dashboard', [Siswa::class, 'dashboard'])->middleware('usersession');
    Route::post('pay', [Siswa::class, 'pay'])->middleware('usersession');
    Route::post('updatetagihan', [Siswa::class, 'updatetagihan'])->middleware('usersession');
    
});