<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\AuthController;

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


Route::group([
    'middleware' => ['api'],
    'prefix' => 'v1'
], function () {
    // User authentication
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('user', [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);

    // Products
    Route::group(['middleware' => 'role:approver'], function () {
        Route::get('product/approved', [ProductController::class, 'approved']);
        Route::post('product/{id}/approve', [ProductController::class, 'approve']);
    });
    Route::post('product', [ProductController::class, 'store'])->middleware('role:submitter');
    Route::get('product', [ProductController::class, 'index']);
});
