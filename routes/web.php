<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JenisBarangController;

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


// Login
Route::get('/', [AuthController::class, 'index']);
Route::post('/cek_login', [AuthController::class, 'cek_login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth','checkrole:admin']], function(){

    // crud data user
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/store', [UserController::class, 'store']);
    Route::get('/user/update/{id}', [UserController::class, 'update']);
    Route::get('/user/destroy/{id}', [UserController::class, 'destroy']);
    
    // crud data jenis barang
    Route::get('/jenisbarang', [JenisBarangController::class, 'index']);
    Route::get('/jenisbarang/store', [JenisBarangController::class, 'store']);
    Route::get('/jenisbarang/update/{id}', [JenisBarangController::class, 'update']);
    Route::get('/jenisbarang/destroy/{id}', [JenisBarangController::class, 'destroy']);
});

Route::group(['middleware' => ['auth','checkrole:admin,kasir']], function(){

    route::get('/home', [HomeController::class, 'index']);

});