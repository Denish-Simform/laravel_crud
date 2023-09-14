<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('employees', EmployeeController::class)->names([
    'index' => 'employees.index',
    'create' => 'employees.create',
    'store' => 'employees.store',
    'show' => 'employees.show',
    'edit' => 'employees.edit',
    'update' => 'employees.update',
    'destroy' => 'employees.destroy',
]);
