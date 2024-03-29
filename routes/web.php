<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/home', [HomeController::class, 'index1'])->name('home');
Route::get('/page', [HomeController::class, 'page'])->name('page');

Route::post('/employee/leave/create', [HomeController::class, 'employee_leave'])->name('employee.leave.post');
Route::get('/employee/createShow', [HomeController::class, 'createshowfront'])->name('employee.createshow.employee');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/employee', [AdminController::class, 'createshow'])->name('employee.createshow');
    Route::get('/list', [AdminController::class, 'employee_list'])->name('list');
    Route::get('/create', [AdminController::class, 'employee_create'])->name('create');
    Route::post('/create/post', [AdminController::class, 'employee_create_post'])->name('create.post');
    Route::post('/create/edit/post/{id}', [AdminController::class, 'employee_edit_post'])->name('create.edit.post');
    Route::get('/employee/deletes/task/{id}', [AdminController::class, 'employee_delete'])->name('employee.delete');



});
