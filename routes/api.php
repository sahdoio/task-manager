<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function (Request $request) {
    return "API is alive!";
});

Route::prefix('tasks')->group(function () {
    Route::get('', [TaskController::class, 'list']);
    Route::post('', [TaskController::class, 'create']);
    Route::delete('{id}', [TaskController::class, 'delete']);
    Route::patch('{id}', [TaskController::class, 'complete']);
});
