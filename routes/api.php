<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DoctorController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Routes for Doctor

Route::post('doctors',[DoctorController::class, 'insert_doctor']);
Route::get('doctors', [DoctorController::class, 'all_doctors'] );
Route::put('doctors/{id}', [DoctorController::class, 'update_doctor'] );
Route::delete('doctors/{id}', [DoctorController::class, 'delete_doctor'] );
Route::get('doctors/{id}', [DoctorController::class, 'get_doctor'] );


// Route::post('doctors',[DoctorController::class, 'insert_doctor']);
// Route::get('doctors', [DoctorController::class, 'all_doctors'] );
// Route::put('doctors/{id}', [DoctorController::class, 'update_doctor'] );
// Route::delete('doctors/{id}', [DoctorController::class, 'delete_doctor'] );
// Route::get('doctors/{id}', [DoctorController::class, 'get_doctor'] );



// Route::get('get-required-weight/{user_id}', [UserManagementController::class, 'getRequiredWeight']);
