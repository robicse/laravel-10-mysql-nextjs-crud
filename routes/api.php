<?php

use App\Http\Controllers\API\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('tasks-lists', [TaskController::class, 'index']);
Route::post('post-tasks', [TaskController::class, 'store']);
Route::get('get-task/{id}', [TaskController::class, 'show']);
Route::post('update-task/{id}', [TaskController::class, 'update']);
Route::post('delete-task/{id}', [TaskController::class, 'destroy']);
