<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DebitNoteController;
use App\Http\Controllers\CreditNoteController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PaymentsReceivedController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LoanRepaymentController;
use App\Http\Controllers\OrderController;

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

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return redirect('dashboard');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('projects', ProjectController::class);

    Route::resource('vendors', VendorController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('expenses', ExpenseController::class);
    Route::resource('debit_note', DebitNoteController::class);
    Route::resource('credit_note', CreditNoteController::class);
    Route::resource('employees', EmployeeController::class);

    Route::resource('payments_received', PaymentsReceivedController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('loans', LoanController::class);
    Route::resource('loan_repayments', LoanRepaymentController::class);
    Route::resource('orders', OrderController::class);

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

    Route::resource('invoices', InvoiceController::class);
    // Route::get('view-records',[InvoiceController::class,'show_invoices'])->name('view-records');
    // Route::get('/view-invoice/{id}',[InvoiceController::class,'show_particular_invoice'])->name('view-invoice');
});
