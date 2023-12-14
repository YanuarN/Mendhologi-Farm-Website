<?php

use App\Http\Controllers\Login;
use App\Http\Controllers\Register;
use App\Http\Controllers\Regsiter;
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
})->name('home');

Route::get('/register', [Register::class, 'index']);
Route::post('/register', [Register::class, 'Create']);

Route::get('/login', [Login::class,'index']);
Route::post('/login',[Login::class,'authtenticate']);
