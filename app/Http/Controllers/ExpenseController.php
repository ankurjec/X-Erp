<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Vendor;
use App\Models\Customer;
use App\Models\Loan;
use App\Models\LoanRepayment;
use App\Models\User;
use App\Notifications\NewExpense;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

class ExpenseController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:expense-list|expense-create|expense-edit|expense-delete', ['only' => ['index','show']]);
         $this->middleware('permission:expense-create', ['only' => ['create','store']]);
         $this->middleware('permission:expense-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:expense-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $expenses = Expense::with(['vendor','user'])->with('order')->latest()->paginate(10);
        return view('dashboard.expenses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $vendors = Vendor::all();
        $users = User::all();
        $orders = Order::where(function($query){
                            $query->where('order_status','!=','completed')
                                ->where('order_status','!=','cancelled');
                        })
                        ->get();
        $loans = Loan::all();
            
        return view('dashboard.expenses.create',compact('customers','vendors','users','orders','loans'));
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
            'type' => 'required',
            'amount' => 'required'
        ]);
        
        $types = $request->input('type');
        
        foreach($types as $key=>$type) {
    		    $expense = new Expense;
    		    $expense->createdby_user_id = $request->user()->id;
    		    $expense->type = $request->input('type')[$key];
    		    
    		    if($request->input('type')[$key] == "general_expense") {
    		        $expense->user_id = isset($request->input('entity_id')[$key]) ? $request->input('entity_id')[$key] : null;
    		    }else if($request->input('type')[$key] == "vendor_payment") {
    		        $expense->vendor_id = isset($request->input('entity_id')[$key]) ? $request->input('entity_id')[$key] : null;
    		    } else if($request->input('type')[$key] == "refunds") {
    		        $expense->customer_id = isset($request->input('entity_id')[$key]) ? $request->input('entity_id')[$key] : null;
    		    }
    		    
    		    /*$expense->user_id = isset($request->input('user_id')[$key]) ? $request->input('user_id')[$key] : null;
    		    $expense->vendor_id = isset($request->input('vendor_id')[$key]) ? $request->input('vendor_id')[$key] : null;
    		    $expense->customer_id = isset($request->input('customer_id')[$key]) ? $request->input('customer_id')[$key] : null;*/
    		    $expense->order_id = isset($request->input('order_id')[$key]) ? $request->input('order_id')[$key] : null;
                $expense->loan_id = isset($request->input('loan_id')[$key]) ? $request->input('loan_id')[$key] : null;
    		    $expense->amount = $request->input('amount')[$key];
    		    $expense->details = $request->input('details')[$key];
    		    $expense->project_id = get_project_id();
    		    $expense->save();

                //Loan Repayment Add
                if(isset($request->input('loan_id')[$key]) && $request->input('loan_id')[$key]) {
                    $this->AddToLoanRepayment($expense->loan_id,$expense->amount,$expense->id);
                }
    		    
    		    $user = User::find(1);
    		    try {
                    $user->notify(new NewExpense($expense));
    		    } catch (\Exception $e) {
                    Log::error($e->getMessage());
                }

                
		    }
    
        return redirect()->route('expenses.index')
                        ->with('success','Expenses created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        $customers = Customer::all();
        $vendors = Vendor::all();
        $users = User::all();
        $orders = Order::where(function($query){
                            $query->where('order_status','!=','completed')
                                ->where('order_status','!=','cancelled');
                        })
                        ->get();
        $loans = Loan::all();
        return view('dashboard.expenses.show',compact('expense','customers','vendors','users','orders','loans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        $customers = Customer::all();
        $vendors = Vendor::all();
        $users = User::all();
        $orders = Order::where(function($query){
                            $query->where('order_status','!=','completed')
                                ->where('order_status','!=','cancelled');
                        })
                        ->get();
        $loans = Loan::all();
        return view('dashboard.expenses.edit',compact('expense','customers','vendors','users','orders','loans'));
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

        //Loan Repayment Add
        if(!$expense->loan_id && $request->input('loan_id')) {
            $this->AddToLoanRepayment($request->input('loan_id'),$request->input('amount'),$expense->id);
        }
    
        $expense->update(request()->except(['_method','_token','action']));        
    
        return redirect()->route('expenses.index')
                        ->with('success','Expense updated successfully');
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
                        ->with('success','Expense deleted successfully');
    }

    public function AddToLoanRepayment($loan_id,$amount,$expense_id) {
        LoanRepayment::create([
            'loan_id' => $loan_id, 
            'amount' => $amount,
            'repayment_date' => now(),
            'details' => 'Automatically created by expense #'.$expense_id,
            'project_id' => get_project_id()
        ]);
    }
}
