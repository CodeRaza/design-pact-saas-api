<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Sneaker;
use App\Http\Controllers\SneakerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\VariationController;

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

Route::middleware('auth:sanctum')->get('/v1/user', function (Request $request) {
    return $request->user();
});

// Public routes
Route::post('/v1/register', [AuthController::class, 'register']);
Route::post('/v1/login', [AuthController::class, 'login']);
Route::get('/v1/sneakers', [SneakerController::class, 'index']);
Route::get('/v1/sneakers/filter', [SneakerController::class, 'filter']);
Route::get('/v1/sneakers/{id}', [SneakerController::class, 'show']);

// Protected routes
// Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/v1/sneakers', [SneakerController::class, 'store']);
    Route::put('/v1/sneakers/{id}', [SneakerController::class, 'update']);
    Route::delete('/v1/sneakers/{id}', [SneakerController::class, 'destroy']);
    Route::post('/v1/logout', [AuthController::class, 'logout']);            
// });


// Designs Routes
Route::get('/v1/designs', [DesignController::class, 'index']);
Route::get('/v1/designs/filter', [DesignController::class, 'filter']);
Route::get('/v1/designs/{id}', [DesignController::class, 'show']);    
Route::post('/v1/designs', [DesignController::class, 'store']);
Route::put('/v1/designs/{id}', [DesignController::class, 'update']);
Route::delete('/v1/designs/{id}', [DesignController::class, 'destroy']);

// Attribute Routes
Route::get('/v1/attributes', [AttributeController::class, 'index']);
Route::get('/v1/attributes/filter', [AttributeController::class, 'filter']);
Route::get('/v1/attributes/{id}', [AttributeController::class, 'show']);    
Route::post('/v1/attributes', [AttributeController::class, 'store']);
Route::put('/v1/attributes/{id}', [AttributeController::class, 'update']);
Route::delete('/v1/attributes/{id}', [AttributeController::class, 'destroy']);

// Variations Routes
Route::get('/v1/variations', [VariationController::class, 'index']);
Route::get('/v1/variations/filter', [VariationController::class, 'filter']);
Route::get('/v1/variations/{id}', [VariationController::class, 'show']);    
Route::post('/v1/variations', [VariationController::class, 'store']);
Route::put('/v1/variations/{id}', [VariationController::class, 'update']);
Route::delete('/v1/variations/{id}', [VariationController::class, 'destroy']);