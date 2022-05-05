<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\MobileApiController;
use App\Http\Controllers\WearApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Mobile Api
Route::get('/patient/{id}',[MobileApiController::class,'getPatient']);
Route::get('/patient/days/{patient}',[MobileApiController::class,'getDays']);
Route::post('/patient/panic/',[MobileApiController::class,'postPanicAttack']);
Route::post('/patient/wb/',[MobileApiController::class,'postWellnessData']);
Route::post('/settings/',[MobileApiController::class,'postSettings']);

//Wear Api (Currently not in use)
Route::get('/wear/settings/',[WearApiController::class,'getSettings']);
Route::post('wear/patient/panic/',[WearApiController::class,'postPanicAttack']);

Route::get('/chat/get/{patient_id}',[ChatController::class,'getMessages']);
Route::post('/chat/send/',[ChatController::class,'sendMessage']);




