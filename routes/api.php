<?php

use App\Http\Controllers\LutadorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/lutadores',[LutadorController::class,'index']);
Route::post('/lutadores',[LutadorController::class,'store']);
Route::get('/lutadores/{id}',[LutadorController::class,'show']);
Route::put('/lutadores/{id}',[LutadorController::class,'update']);
Route::delete('/lutadores/{id}',[LutadorController::class,'destroy']);
