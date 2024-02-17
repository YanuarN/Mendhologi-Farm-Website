<?php

use App\Http\Controllers\AdminLogin;
use App\Http\Controllers\HewanController;
use App\Http\Controllers\Login;
use App\Http\Controllers\Register;
use App\Http\Controllers\Regsiter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
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
})->name('home');

Route::get('/register', [Register::class, 'index']);
Route::post('/register', [Register::class, 'Create']);

Route::controller(Login::class)->group(function () {
    Route::get('/login', 'index')->middleware('customGuest')->name('login');
    Route::post('/login', 'authtenticate');
    Route::post('/logout', 'Logout');
});

// Route::get('/user', [UserController::class, 'index'])->middleware('auth:admin');
Route::resource('user', UserController::class)->middleware('auth:admin');
Route::resource('admin', AdminLogin::class)->middleware('auth:admin');
Route::resource('kategori', KategoriController::class)->middleware('auth:admin');
Route::resource('hewan', HewanController::class)->middleware('auth:admin');
// Menyimpan kategori baru ke database
// Route::post('/kategori', [KategoriController::class, 'store'])->name('kategoris.store');
