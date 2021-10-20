<?php

use App\Http\Controllers\UserController;
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

Route::get('login', [UserController::class, 'index'])->name('login');
Route::get('cadastro', [UserController::class, 'cadastro'])->name('cadastro');

Route::post('auth', [UserController::class, 'auth'])->name('auth');
Route::post('register', [UserController::class, 'register'])->name('register');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/principal', [UserController::class, 'principal'])->name('principal');
    Route::get('/sair', [UserController::class, 'logout'])->name('logout');
});

