<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentsReceived;
use App\Models\Customer;

class PaymentsReceivedController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:payments-received-list|payments-received-create|payments-received-edit|payments-received-delete', ['only' => ['index','show']]);
         $this->middleware('permission:payments-received-create', ['only' => ['create','store']]);
         $this->middleware('permission:payments-received-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:payments-received-delete', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        $payments_received = PaymentsReceived::latest()->paginate(10);
        return view('dashboard.payments_received.index',compact('payments_received'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    
    
    public function create()
    {
        $customers = Customer::all();
        return view('dashboard.payments_received.create',compact('customers'));
    }
    
    
    public function store(Request $request)
    {
        request()->validate([
            'from' => 'required',
            'amount' => 'required'
        ]);
    
        PaymentsReceived::create($request->all());
    
        return redirect()->route('payments_received.index')
                        ->with('success','Payments received added successfully.');
    }
    
    
    public function show($id)
    {
        $payment_received = PaymentsReceived::find($id);
        return view('dashboard.payments_received.show',compact('payment_received'));
    }
    
    
    public function edit($id)
    {
        $customers = Customer::all();
        $payment_received = PaymentsReceived::find($id);
        return view('dashboard.payments_received.edit',compact('payment_received','customers'));
    }
    
    
    public function update(Request $request, $id)
    {
        request()->validate([
            'from' => 'required',
            'amount' => 'required'
        ]);
    
        $payment_received = PaymentsReceived::find($id);
        $payment_received->update($request->all());
    
        return redirect()->route('payments_received.index')
                        ->with('success','Payments received updated successfully');
    }
    
    
    public function destroy($id)
    {
        PaymentsReceived::destroy($id);
    
        return redirect()->route('payments_received.index')
                        ->with('success','Payments received deleted successfully');
    }
}
