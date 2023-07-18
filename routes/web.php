<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


use App\Http\Controllers\EmployeeController;

Route::get('/', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/store', [EmployeeController::class, 'store'])->name('employees.store');
Route::delete('/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
