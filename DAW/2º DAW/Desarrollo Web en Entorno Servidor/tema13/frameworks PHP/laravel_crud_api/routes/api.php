<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\socioController;

Route::get('/socios', [socioController::class, 'index']);

Route::get('/socios/{id}',[socioController::class, 'show']);

Route::post('/socios', [socioController::class, 'store']);

Route::put('/socios/{id}',[socioController::class, 'update']);

Route::patch('/socios/{id}',[socioController::class, 'updatePartial']);

Route::delete('/socios/{id}',[socioController::class, 'destroy']);
