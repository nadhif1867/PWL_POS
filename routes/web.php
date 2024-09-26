<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route untuk LevelController
Route::get('/level', [LevelController::class, 'index']);

// Route untuk KategoriController
Route::get('/kategori', [KategoriController::class, 'index']);

// Route untuk UserController
Route::get('/user', [UserController::class, 'index']);

// Route untuk Tambah
Route::get("/user/tambah", [UserController::class, 'tambah']);

// Route untuk tambah_simpan
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);

// Route untuk ubah{id}
Route::get("/user/ubah/{id}", [UserController::class, 'ubah']);

// Route untuk ubah_simpan{id}
Route::put("/user/ubah_simpan/{id}", [UserController::class, 'ubah_simpan']);

// Route untuk hapus{id}
Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);

// Route untuk WelcomeController
Route::get('/', [WelcomeController::class, 'index']);