<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', [AuthController::class, 'logout'])->middleware('AuthLogin');

Route::get('/login', function () {
    return view('login');
})->middleware('isLogin');
Route::post('/login', [AuthController::class, 'login'])->middleware('isLogin');

Route::get('/register', function () {
    return view('register');
})->middleware('isLogin');
Route::post('/register', [AuthController::class, 'register'])->middleware('isLogin');

Route::get('/profile', [ClientController::class, 'index'])->middleware('AuthLogin');
Route::post('/update-profile', [ClientController::class, 'update'])->middleware('AuthLogin');
Route::post('/daftar-vaksin', [OrderController::class, 'store'])->middleware('AuthLogin');
