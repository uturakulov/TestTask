<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\PortfolioCategoryController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\Pricingcontroller;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController as ControllersHomeController;
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

Route::get('/admin/index', HomeController::class)->name('admin-home');
Route::post('/admin/login', [AuthController::class, 'login'])->name('login-post');
Route::get('/admin/login', [AuthController::class, 'index'])->name('login');
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('logout');
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::resource('/employee', EmployeeController::class);
    Route::get('/employee/delete/{id}', [EmployeeController::class, 'destroy']);
    Route::resource('/job', JobController::class);
    Route::get('/job/delete/{id}', [JobController::class, 'destroy']);
    Route::resource('/portfolio', PortfolioController::class);
    Route::get('/portfolio/delete/{id}', [PortfolioController::class, 'destroy']);
    Route::resource('/category', PortfolioCategoryController::class);
    Route::get('/category/delete/{id}', [PortfolioCategoryController::class, 'destroy']);
    Route::resource('/pricing', Pricingcontroller::class);
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/delete/{id}', [UserController::class, 'destroy']);
});

Route::get('/', [ControllersHomeController::class, 'callAndShow']);
Route::post('/contactus', [ControllersHomeController::class, 'contactUs']);
