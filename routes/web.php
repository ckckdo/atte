<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RestController;



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
    Route::group(['middleware'=>['guest']],function(){
        Route::get('/register',[AuthController::class,'getRegister'])->name('getRegister');
        Route::post('/register',[AuthController::class,'postRegister'])->name('postRegister');
        Route::get('/login',[AuthController::class,'getLogin'])->name('getLogin');
        Route::post('/login',[AuthController::class,'postLogin'])->name('postLogin');
    });

    Route::group(['middleware'=>['auth']],function(){
        Route::get('/',[AttendanceController::class,'getIndex'])->name('getIndex');
        Route::post('/logout',[AuthController::class,'postLogout'])->name('postLogout');
        Route::get('/attendance/start',[AttendanceController::class,'startAttendance'])->name('startAttendance');
        Route::get('/attendance/end',[AttendanceController::class,'endAttendance'])->name('endAttendance');
        Route::get('/attendance/{num}',[AttendanceController::class,'getAttendance'])->name('getAttendance');
        Route::get('/rest/start',[RestController::class,'startRest'])->name('startRest');
        Route::get('/rest/end',[RestController::class,'endRest'])->name('endRest');
    });


