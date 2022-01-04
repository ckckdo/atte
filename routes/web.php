<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

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

Route::get('/register',[AuthController::class,'getRegister'])->name('getRegister');
Route::post('/register',[AuthController::class,'postRegister'])->name('postRegister');
Route::get('/login',[AuthController::class,'getLogin'])->name('getLogin');
Route::post('/login',[AuthController::class,'postLogin'])->name('postLogin');


