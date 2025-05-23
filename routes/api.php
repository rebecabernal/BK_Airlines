<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlaneController;
use App\Http\Controllers\FlightController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');
});

//Flights routes
Route::get('/flights/show/{id}',[FlightController::class, 'show'])->name('apiflightshow');
Route::delete('/flights/destroy/{id}',[FlightController::class, 'destroy'])->middleware('role:admin', 'auth:api')->name('apiflightdestroy');
Route::post('/flights/store',[FlightController::class, 'store'])->middleware('role:admin', 'auth:api')->name('apiflightstore');
Route::put('/flights/update/{id}',[FlightController::class, 'update'])->middleware('role:admin', 'auth:api')->name('apiflightupdate');
Route::get('/flights',[FlightController::class,'index'])->name('apiflightall');

//Planes routes
Route::get('/planes',[PlaneController::class,'index'])->name('apiplaneall');
Route::get('/planes/show/{id}',[PlaneController::class, 'show'])->name('apiplaneshow');
Route::delete('/planes/destroy/{id}',[PlaneController::class, 'destroy'])->middleware('role:admin', 'auth:api')->name('apiplanedestroy');
Route::post('/planes/store',[PlaneController::class, 'store'])->middleware('role:admin', 'auth:api')->name('apiplanestore');
Route::put('/planes/update/{id}',[PlaneController::class, 'update'])->middleware('role:admin', 'auth:api')->name('apiplaneupdate');