<?php

use App\Http\Controllers\DashboardController;
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


//Auth Routes
Route::get('/login',[MainController::class,'showLogin'])->name('login')->middleware('guest');
Route::post('/login',[MainController::class,'login'])->name('login-user');
Route::get('/register',[MainController::class,'showRegister'])->name('register')->middleware('guest');
Route::post('/register',[MainController::class,'register'])->name('register-new-user');
Route::get('/logout',[MainController::class,'logout'])->name('logout')->middleware('auth');


//Patient Routes
Route::get('/patients',[PatientsController::class,'index'])->name('patients')->middleware('auth');
Route::post('/patients',[PatientsController::class,'store'])->name('store-patient')->middleware('auth');

//Dashboard Routes
Route::get('/dashboard/{patient}',[DashboardController::class,'index'])->name('dashboard')->middleware('auth');
Route::get('/dashboard/pdf/{patient}',[DashboardController::class,'printPDF'])->name('print')->middleware('auth');
Route::post('/dashboard/add-wellness/',[DashboardController::class,'storeWellnessData'])->name('store-wellness')->middleware('auth');
Route::get('/dashboard/add-panic-attack/{id}',[DashboardController::class,'storePanicAttack'])->name('store-panic')->middleware('auth');





