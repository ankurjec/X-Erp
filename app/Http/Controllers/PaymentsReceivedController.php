<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentsReceived;
use App\Models\Customer;
use App\Models\Order;

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
        $payments_received = PaymentsReceived::with('customer')->with('order')->latest()->paginate(10);
        return view('dashboard.payments_received.index',compact('payments_received'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    
    
    public function create()
    {
        $customers = Customer::all();
        $orders = Order::where(function($query){
                            $query->where('order_status','!=','completed')
                                ->where('order_status','!=','cancelled');
                        })
                        ->get();
        return view('dashboard.payments_received.create',compact('customers','orders'));
    }
    
    
    public function store(Request $request)
    {
        request()->validate([
            'customer_id' => 'required',
            'amount' => 'required'
        ]);
    
        PaymentsReceived::create($request->all());
    
        return redirect()->route('payments_received.index')
                        ->with('success','Payments received added successfully.');
    }
    
    
    public function show($id)
    {
        $payment_received = PaymentsReceived::find($id);
        $orders = Order::where(function($query){
                            $query->where('order_status','!=','completed')
                                ->where('order_status','!=','cancelled');
                        })
                        ->get();
        return view('dashboard.payments_received.show',compact('payment_received','orders'));
    }
    
    
    public function edit($id)
    {
        $customers = Customer::all();
        $payment_received = PaymentsReceived::find($id);
        $orders = Order::where(function($query){
                            $query->where('order_status','!=','completed')
                                ->where('order_status','!=','cancelled');
                        })
                        ->get();
        return view('dashboard.payments_received.edit',compact('payment_received','customers','orders'));
    }
    
    
    public function update(Request $request, $id)
    {
        request()->validate([
            'customer_id' => 'required',
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
