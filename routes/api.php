<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\EmployeeController;

Route::post('/check-email', [EmployeeController::class, 'checkEmail'])->name('employee.checkEmail');
Route::post('/check-phone', [EmployeeController::class, 'checkPhone'])->name('employee.checkPhone');


