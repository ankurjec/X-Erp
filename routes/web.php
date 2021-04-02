<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PaymentsReceivedController;
use App\Http\Controllers\PaymentController;

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

require __DIR__.'/auth.php';

Route::get('/', function () {
    return redirect('dashboard');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('dashboard', function () {
        return view('dashboard.homepage');
    })->name('dashboard');
    
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
     Route::resource('projects', ProjectController::class);
    
    Route::resource('vendors', VendorController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('expenses', ExpenseController::class);
    Route::resource('payments_received', PaymentsReceivedController::class);
    Route::resource('payments', PaymentController::class);
    
});
