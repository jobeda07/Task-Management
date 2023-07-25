<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard')->middleware('admin');
Route::get('/employee', [AdminController::class, 'createshow'])->name('employee.createshow')->middleware('admin');



Route::get('/employee/create',[Employee::class,'employee_create'])->name('employee.create');
Route::post('/employee/post',[Employee::class,'employee_create_post'])->name('employee.create.post');
Route::get('/employee/list',[Employee::class,'employee_list'])->name('employee.list');
