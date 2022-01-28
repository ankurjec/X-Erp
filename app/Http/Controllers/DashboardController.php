<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\PaymentsReceived;
use App\Models\Vendor;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Loan;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request) {
        $from = $request->input('from');
        $to = $request->input('to');
        
        if($from && $to)
        {
            $start_date = $from;
            $end_date = $to;
        }
        else
        {
            $now = Carbon::now();
            $end_date = $now->toDateString();
            $start_date = $now->subMonth()->toDateString();
        }
        
        $total_expense = $this->getTotalExpenses();
        $total_payments_received = $this->getTotalPaymentsReceived();
        $total_loans = $this->getTotalLoans();
        $total_vendors = $this->getTotalVendors();
        $total_customers = $this->getTotalCustomers();
        
        $total_payments = $this->getTotalPayments();
        $profit_loss = $total_payments_received + $total_loans - $total_payments;
        
        $expense_array = $this->getExpensesArray($start_date,$end_date);
        $payments_received_array = $this->getPaymentsReceivedArray($start_date,$end_date);
        $loans_array = $this->getLoansArray($start_date,$end_date);
        
        return view('dashboard.homepage',compact('total_expense','total_payments_received','total_vendors','total_customers','profit_loss','expense_array','payments_received_array','loans_array'));
    }
    
    public function getTotalExpenses() {
        $total = Expense::sum('amount');
        return $total;
    }
    
    public function getExpensesArray($start_date,$end_date) {
        $arr = Expense::select(['amount'])
                        ->whereDate('created_at','>=', $start_date)
                        ->whereDate('created_at','<=', $end_date)
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
    
    public function getPaymentsReceivedArray($start_date,$end_date) {
        $arr = PaymentsReceived::select(['amount'])
                        ->whereDate('received_date','>=', $start_date)
                        ->whereDate('received_date','<=', $end_date)
                        ->get();
        $arr = $arr->map(function($item, $key) {
           return (float)$item->amount;
        });
        return $arr;
    }
    
    public function getLoansArray($start_date,$end_date) {
        $arr = Loan::select(['amount'])
                        ->whereDate('received_date','>=', $start_date)
                        ->whereDate('received_date','<=', $end_date)
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

    public function getTotalLoans() {
        $total = Loan::sum('amount');
        return $total;
    }
}
