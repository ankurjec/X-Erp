<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PaymentsReceivedController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LoanRepaymentController;

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
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
     Route::resource('projects', ProjectController::class);
    
    Route::resource('vendors', VendorController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('expenses', ExpenseController::class);
    Route::resource('payments_received', PaymentsReceivedController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('loans', LoanController::class);
    Route::resource('loan_repayments', LoanRepaymentController::class);
    
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
});

Route::get('errortest', function(){
    return $e;
});
