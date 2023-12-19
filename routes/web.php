<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Login;
use App\Http\Controllers\Register;
use App\Http\Controllers\Regsiter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::controller(Login::class)-> group(function(){
    Route::get('/login','index')->middleware('guest')->name('login');
    Route::post('/login','authtenticate');
});

Route::get('/user', [UserController::class, 'index'])->name('users.index');