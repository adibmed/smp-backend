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

    // Guest
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('user', [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);


    // Approved Product - All Users
    Route::get('product', [ProductController::class, 'getApproved']);

    // Submitter
    Route::group(['middleware' => 'role:submitter'], function () {
        // Submit Product
        Route::post('product', [ProductController::class, 'store']);
    });

    // Reviewer
    Route::group(['middleware' => 'role:reviewer'], function () {
        // Submitted Products
        Route::get('product/submitted', [ProductController::class, 'index']);
        Route::get('product/{id}', [ProductController::class, 'show']);
        Route::put('product', [ProductController::class, 'update']);
    });


});

