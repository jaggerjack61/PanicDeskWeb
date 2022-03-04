<?php

use App\Http\Controllers\PatientsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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
Route::get('/',[MainController::class,'index'])->name('home');
Route::get('/login',[MainController::class,'showLogin'])->name('login')->middleware('guest');
Route::post('/login',[MainController::class,'login'])->name('login-user');
Route::get('/register',[MainController::class,'showRegister'])->name('register')->middleware('guest');
Route::post('/register',[MainController::class,'register'])->name('register-new-user');
Route::get('/dashboard',[MainController::class,'showDashboard'])->name('dashboard')->middleware('auth');
Route::get('/patients',[PatientsController::class,'index'])->name('patients')->middleware('auth');
Route::get('/logout',[MainController::class,'logout'])->name('logout')->middleware('auth');





