<?php


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Admin;


use App\Http\Controllers\Api\V1\Auth\AdminAuthController;
use App\Http\Controllers\APi\V1\Teacher\StudentController;

use App\Http\Controllers\Api\V1\Auth\StudentAuthController;
use App\Http\Controllers\Api\V1\Auth\TeacherAuthController;


use App\Http\Controllers\Api\V1\Student\StudentResultController;
use App\Http\Controllers\Api\V1\Student\StudentProfileController;
use App\Http\Controllers\Api\V1\Teacher\UploadStudentResultController;



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


Route::prefix('admin')->group(function (){
    Route::post('login', [AdminAuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function() {
        Route::apiResource('/students', Admin\StudentController::class)->only(['index', 'show', 'destroy']);
        Route::apiResource('/teachers', Admin\TeacherController::class)->only(['index', 'show', 'update', 'destroy']);
        Route::post('/teacher/{class_to_teach}', [TeacherAuthController::class, 'store']);
        Route::apiResource('/grade', Admin\StudentGradeController::class)->only(['index', 'store', 'destroy']);
        Route::apiResource('/student/results', StudentResultController::class);
        Route::post('logout', [AdminAuthController::class, 'logout']);
    });
});

Route::prefix('teacher')->group(function (){
    Route::post('login', [TeacherAuthController::class, 'login']);
    
    Route::middleware('auth:sanctum')->group(function() {
        Route::post('logout', [TeacherAuthController::class, 'logout']);
        Route::get('/students/{teacher:student_class_id}/', [StudentController::class, 'index']);
        Route::get('/students/{teacher:student_class_id}/{student}', [StudentController::class, 'show']);
        Route::get('/students/{teacher:student_class_id}/{student}', [StudentController::class, 'show']);
        Route::put('/results/student/{student}', [UploadStudentResultController::class, 'update']);
        Route::post('logout', [TeacherAuthController::class, 'logout']);
    });
});

Route::prefix('portal')->group(function (){
    Route::post('{student}/register', [StudentAuthController::class, 'register']);
    Route::post('login', [StudentAuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function() {
        Route::apiResource('/student', StudentProfileController::class)->only(['show', 'update', 'destroy']);
        Route::get('/student/result/{student:student_id}', [StudentResultController::class, 'show']);
        Route::post('logout', [StudentAuthController::class, 'logout']);
    });
});

Route::get('', [TeacherAuthController::class,'']);