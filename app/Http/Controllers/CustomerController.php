<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:customer-list|customer-create|customer-edit|customer-delete', ['only' => ['index','show']]);
         $this->middleware('permission:customer-create', ['only' => ['create','store']]);
         $this->middleware('permission:customer-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:customer-delete', ['only' => ['destroy']]);
    }
    
    
    public function index()
    {
        // $customers = Customer::latest()->paginate(10);
        return view('dashboard.customers.index');
    }
    
    
    public function create()
    {
        return view('dashboard.customers.create');
    }
    
    
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required'
        ]);
    
        Customer::create($request->all());
    
        return redirect()->route('customers.index')
                        ->with('success','Customer created successfully.');
    }
    
    
    public function show(Customer $customer)
    {
        return view('dashboard.customers.show',compact('customer'));
    }
    
    
    public function edit(Customer $customer)
    {
        return view('dashboard.customers.edit',compact('customer'));
    }
    
    
    public function update(Request $request, Customer $customer)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        $customer->update($request->all());
    
        return redirect()->route('customers.index')
                        ->with('success','Customer updated successfully');
    }
    
    
    public function destroy(Customer $customer)
    {
        $customer->delete();
    
        return redirect()->route('customers.index')
                        ->with('success','Customer deleted successfully');
    }
}
