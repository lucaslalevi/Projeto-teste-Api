<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceOrderController;

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


// Criar uma nova ordem de serviço
Route::post('/service_orders', [ServiceOrderController::class, 'store']);

// Listar todas as ordens de serviço
Route::get('/service_orders', [ServiceOrderController::class, 'index']);

// Buscar uma ordem de serviço específica pelo ID
Route::get('/service_orders/{id}', [ServiceOrderController::class, 'show']);


