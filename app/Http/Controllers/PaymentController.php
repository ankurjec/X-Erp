<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Expense;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Customer;

class PaymentController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:payment-list|payment-create|payment-edit|payment-delete', ['only' => ['index','show']]);
         $this->middleware('permission:payment-create', ['only' => ['create','store']]);
         $this->middleware('permission:payment-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:payment-delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::latest()->paginate(5);
        return view('dashboard.payments.index',compact('payments'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expenses = Expense::all();
        $users = User::all();
        $vendors = Vendor::all();
        $customers = Customer::all();
        return view('dashboard.payments.create',compact('expenses','users','vendors','customers'));
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
            'expense_ids' => 'required',
            'amount' => 'required',
        ]);
        
        Payment::create($request->all());
    
        return redirect()->route('payments.index')
                        ->with('success','Payment created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return view('dashboard.payments.show',compact('payment'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        $expenses = Expense::all();
        $users = User::all();
        $vendors = Vendor::all();
        $customers = Customer::all();
        return view('dashboard.payments.edit',compact('payment','expenses','users','vendors','customers'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
         request()->validate([
            'expense_ids' => 'required',
            'amount' => 'required',
        ]);
    
        $payment->update($request->all());
    
        return redirect()->route('payments.index')
                        ->with('success','Payment updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
    
        return redirect()->route('payments.index')
                        ->with('success','Payment deleted successfully');
    }
}
