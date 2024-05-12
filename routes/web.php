<?php

use App\Http\Controllers\AdminLogin;
use App\Http\Controllers\HewanController;
use App\Http\Controllers\Login;
use App\Http\Controllers\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PendapatanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PesananController;
use Khill\Lavacharts\DataTables\Rows\Row;

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

Route::resource('shop', ShopController::class);
Route::post('/order/create', [OrderController::class, 'store'])->name('order.store')->middleware('auth:web');
Route::get('/order/create', [OrderController::class, 'create'])->name('order.create')->middleware('auth:web');

//Route Dashboard Admin
Route::middleware(['auth:admin'])->group(function () {
    Route::resource('user', UserController::class);
    Route::resource('admin', AdminLogin::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('hewan', HewanController::class);
    Route::resource('pendapatan', PendapatanController::class);
    Route::resource('pengeluaran', PengeluaranController::class);
    Route::resource('pesanan', PesananController::class);

});
