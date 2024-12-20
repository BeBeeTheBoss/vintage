<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\SubCategoryController;
use App\Http\Controllers\Api\MainCategoryController;

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

Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    //main categories
    Route::group(['prefix' => '/main-categories','controller' => MainCategoryController::class], function () {
        Route::get('/','index');
        Route::post('/','store');
        Route::post('/update','update');
        Route::delete('/','destroy');
    });

    //sub categories
    Route::group(['prefix' => '/sub-categories','controller' => SubCategoryController::class], function () {
        Route::get('/','index');
        Route::post('/','store');
        Route::post('/update','update');
        Route::delete('/','destroy');
    });

});
