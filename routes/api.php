<?php
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    // Get current user's tasks
    Route::get('/my-tasks', [TaskController::class, 'userTasks']);
    
    // Project and Task resources
    Route::apiResource('projects', ProjectController::class);
    Route::apiResource('tasks', TaskController::class);
});

