<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\VFiController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/', [VFiController::class, 'index']);
Route::post('/add-vfi', [VFiController::class, 'store']);
Route::get('/edit-vfi/{id}', [VFiController::class, 'edit']);
Route::put('update-vfi/{id}', [VFiController::class, 'update']);
Route::delete('delete-vfi/{id}', [VFiController::class, 'destroy']);