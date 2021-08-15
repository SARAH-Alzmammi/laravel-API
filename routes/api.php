<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CertificatesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShareController;
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
Route::middleware(['cors'])->group(function () {
 // Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

 //Do not support this functionlaty yet!
// Route::get('/pubcertificates/{username}', [ShareController::class, 'index']);

// Protected routes

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('/certificates', [CertificatesController::class, 'index']);
    Route::post('/certificates', [CertificatesController::class, 'store']);
    Route::get('/certificates/{id}', [CertificatesController::class, 'edit']);
    Route::put('/certificates/{id}', [CertificatesController::class, 'update']);
    Route::delete('/certificates/{id}', [CertificatesController::class, 'destroy']);
    
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user(); });


});
