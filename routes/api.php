<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\Admin\StudentController;
use App\Http\Controllers\Api\V1\Admin\TeacherController;

use App\Http\Controllers\APi\V1\Auth\AdminAuthController;
use App\Http\Controllers\APi\V1\Auth\StudentAuthController;



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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('admin')->group(function (){
    Route::post('login', [AdminAuthController::class, 'login']);

    // Route::middleware('auth:sanctum')->group(function() {
        Route::apiResource('/student', StudentController::class);
        Route::apiResource('/teacher', TeacherController::class);
    // });
});


Route::prefix('portal')->group(function (){
    Route::post('register', [StudentAuthController::class, 'register']);
    Route::post('login', [StudentAuthController::class, 'login']);

    // Route::middleware('auth:sanctum')->group(function() {
        Route::apiResource('/student', StudentController::class);
    // });
});


