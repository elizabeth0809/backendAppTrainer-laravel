<?php

use App\Http\Controllers\Api\Exercise\ExerciseController;
use App\Http\Controllers\Api\ObjetiveExercise\ObjetiveExerciseController;
use App\Http\Controllers\Api\OpeningSchedule\OpeningScheduleController;
use App\Http\Controllers\Api\SchedulingExercise\SchedulingExerciseController;
use App\Http\Controllers\Api\User\UserController;
use App\Http\Controllers\Api\UserMeasurement\UserMeasurementController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) { return $request->user();})->middleware('auth:sanctum');
//user
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/user', [UserController::class, 'index']);
//exercise
Route::post('/exercise', [ExerciseController::class, 'store']);
Route::get('/exercise', [ExerciseController::class, 'index']);       // listar
Route::get('/exercise/{id}', [ExerciseController::class, 'show']);   // mostrar
Route::put('/exercise/{id}', [ExerciseController::class, 'update']); // actualizar
Route::delete('/exercise/{id}', [ExerciseController::class, 'destroy']);
//opening schedules
Route::post('/opening', [OpeningScheduleController::class, 'store']);
Route::get('/opening', [OpeningScheduleController::class, 'index']);       // listar
Route::get('/opening/{id}', [OpeningScheduleController::class, 'show']);   // mostrar
Route::put('/opening/{id}', [OpeningScheduleController::class, 'update']); // actualizar
Route::delete('/opening/{id}', [OpeningScheduleController::class, 'destroy']);

//user measurement

Route::middleware(['auth:api'])->group(function () {
//objetvos
Route::post('/objetive', [ObjetiveExerciseController::class, 'store']);
Route::get('/objetive', [ObjetiveExerciseController::class, 'index']);       // listar
Route::get('/objetive/{id}', [ObjetiveExerciseController::class, 'show']);   // mostrar
Route::put('/objetive/{id}', [ObjetiveExerciseController::class, 'update']); // actualizar
Route::delete('/objetive/{id}', [ObjetiveExerciseController::class, 'destroy']);
//opening schedules
Route::post('/scheduling', [SchedulingExerciseController::class, 'store']);
Route::get('/scheduling', [SchedulingExerciseController::class, 'index']);       // listar
Route::get('/scheduling/{id}', [SchedulingExerciseController::class, 'show']);   // mostrar
Route::put('/scheduling/{id}', [SchedulingExerciseController::class, 'update']); // actualizar
Route::delete('/scheduling/{id}', [SchedulingExerciseController::class, 'destroy']);
//measurement
Route::post('/measurement', [UserMeasurementController::class, 'store']);
Route::get('/measurement', [UserMeasurementController::class, 'index']);       // listar
Route::get('/measurement/{id}', [UserMeasurementController::class, 'show']);   // mostrar
Route::put('/measurement/{id}', [UserMeasurementController::class, 'update']); // actualizar
Route::delete('/measurement/{id}', [UserMeasurementController::class, 'destroy']);
});
