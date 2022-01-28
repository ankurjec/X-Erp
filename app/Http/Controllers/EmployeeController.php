<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Vendor;
use App\Models\Customer;
use App\Models\Loan;
use App\Models\LoanRepayment;
use App\Models\User;
use App\Notifications\NewExpense;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:employees-list|employees-create|employees-edit|employees-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:employees-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:employees-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:employees-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::latest()->paginate(10);
        return view('dashboard.employees.index', compact('employees'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loans = Loan::all();

        $customers = Customer::all();
        $vendors = Vendor::all();
        $users = User::all();
        $orders = Order::where(function ($query) {
            $query->where('order_status', '!=', 'completed')
                ->where('order_status', '!=', 'cancelled');
        })
            ->get();

        return view('dashboard.employees.create', compact('customers', 'vendors', 'users', 'orders','loans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'employee_name' => 'required',
            'details' => 'required',
            'address' => 'required',

        ]);

        Employee::create(['employee_name' => request()->employee_name, 'dob' => request()->dob,'details' => request()->details,'dob' => request()->dob,'address' => request()->address,'phone' => request()->phone,'email' => request()->email,  'project_id' => request()->project_id]);
        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully.');
    }

    //     if($request->hasFile('photos')){
    //         // dd($request->photos);
    //         $paths = '';
    //         foreach($request->photos as $photo){
    //             $path = $photo->store('uploads/expenses');
    //             if(!$paths){
    //                 $paths = $path;
    //             }else{
    //                 $paths = $paths.','.$path;
    //             }
    //         }

    //  //  return $path;
    //     }
    //     Expense::create(['type' => request()->type,'amount'=> request()->detail, 'filename'=> $paths,'project_id'=> request()->project_id ]);
    //     return redirect()->route('expenses.index')
    //                     ->with('success','Expenses created successfully.');
    // }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $loans = Loan::all();

        $customers = Customer::all();
        $vendors = Vendor::all();
        $users = User::all();
        $orders = Order::where(function ($query) {
            $query->where('order_status', '!=', 'completed')
                ->where('order_status', '!=', 'cancelled');
        })
            ->get();
        return view('dashboard.employees.show', compact('employee', 'customers', 'vendors', 'users', 'orders','loans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        $loans = Loan::all();

        $customers = Customer::all();
        $vendors = Vendor::all();
        $users = User::all();
        $orders = Order::where(function ($query) {
            $query->where('order_status', '!=', 'completed')
                ->where('order_status', '!=', 'cancelled');
        })
            ->get();
        return view('dashboard.expenses.edit', compact('loans','expense', 'customers', 'vendors', 'users', 'orders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        request()->validate([
            'type' => 'required',
            'amount' => 'required'
        ]);

        $expense->update(request()->except(['_method', '_token', 'action']));

        return redirect()->route('expenses.index')
            ->with('success', 'Expense updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();

        return redirect()->route('expenses.index')
            ->with('success', 'Expense deleted successfully');
    }

    public function AddToLoanRepayment($loan_id,$amount,$expense_id,$repayment_date) {
        LoanRepayment::create([
            'loan_id' => $loan_id, 
            'amount' => $amount,
            'repayment_date' => $repayment_date,
            'details' => 'Automatically created by expense #'.$expense_id,
            'project_id' => get_project_id()
        ]);
    }
}
