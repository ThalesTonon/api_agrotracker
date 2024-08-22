<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmailApiController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FinancialRecordController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('users', UserController::class);
Route::apiResource('company', CompanyController::class);
Route::get('/company/{company}/users', [CompanyController::class, 'users']);
Route::apiResource('events', EventController::class);
Route::apiResource('financial-records', FinancialRecordController::class)->middleware('auth:sanctum');
Route::apiResource('inventory', InventoryController::class)->middleware('auth:sanctum');
Route::apiResource('equipment', EquipmentController::class)->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Rotas dos Emails
Route::post('/send-email', [EmailApiController::class, 'sendEmail']);
