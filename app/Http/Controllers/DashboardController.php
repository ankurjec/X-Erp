<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\PaymentsReceived;
use App\Models\Vendor;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Loan;

class DashboardController extends Controller
{
    public function index() {
        $total_expense = $this->getTotalExpenses();
        $total_payments_received = $this->getTotalPaymentsReceived();
        $total_vendors = $this->getTotalVendors();
        $total_customers = $this->getTotalCustomers();
        
        $total_payments = $this->getTotalPayments();
        $profit_loss = $total_payments_received - $total_payments;
        
        $expense_array = $this->getExpensesArray();
        $payments_received_array = $this->getPaymentsReceivedArray();
        $loans_array = $this->getLoansArray();
        
        return view('dashboard.homepage',compact('total_expense','total_payments_received','total_vendors','total_customers','profit_loss','expense_array','payments_received_array','loans_array'));
    }
    
    public function getTotalExpenses() {
        $total = Expense::sum('amount');
        return $total;
    }
    
    public function getExpensesArray() {
        $arr = Expense::select(['amount'])
                        ->get();
        $arr = $arr->map(function($item, $key) {
           return (float)$item->amount;
        });
        return $arr;
    }
    
    public function getTotalPaymentsReceived() {
        $total = PaymentsReceived::sum('amount');
        return $total;
    }
    
    public function getPaymentsReceivedArray() {
        $arr = PaymentsReceived::select(['amount'])
                        ->get();
        $arr = $arr->map(function($item, $key) {
           return (float)$item->amount;
        });
        return $arr;
    }
    
    public function getLoansArray() {
        $arr = Loan::select(['amount'])
                        ->get();
        $arr = $arr->map(function($item, $key) {
           return (float)$item->amount;
        });
        return $arr;
    }
    
    public function getTotalVendors() {
        $total = Vendor::count();
        return $total;
    }
    
    public function getTotalCustomers() {
        $total = Customer::count();
        return $total;
    }
    
    public function getTotalPayments() {
        $total = Payment::sum('amount');
        return $total;
    }
}
