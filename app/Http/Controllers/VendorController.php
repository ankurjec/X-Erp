<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;

class VendorController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:vendor-list|vendor-create|vendor-edit|vendor-delete', ['only' => ['index','show']]);
         $this->middleware('permission:vendor-create', ['only' => ['create','store']]);
         $this->middleware('permission:vendor-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:vendor-delete', ['only' => ['destroy']]);
    }
    
    
    public function index()
    {
        $vendors = Vendor::latest()->paginate(10);
        return view('dashboard.vendors.index',compact('vendors'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    
    
    public function create()
    {
        return view('dashboard.vendors.create');
    }
    
    
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        Vendor::create($request->all());
    
        return redirect()->route('vendors.index')
                        ->with('success','Vendor created successfully.');
    }
    
    
    public function show(Vendor $vendor)
    {
        return view('dashboard.vendors.show',compact('vendor'));
    }
    
    
    public function edit(Vendor $vendor)
    {
        return view('dashboard.vendors.edit',compact('vendor'));
    }
    
    
    public function update(Request $request, Vendor $vendor)
    {
         request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        $vendor->update($request->all());
    
        return redirect()->route('vendors.index')
                        ->with('success','Vendor updated successfully');
    }
    
    
    public function destroy(Vendor $vendor)
    {
        $vendor->delete();
    
        return redirect()->route('vendors.index')
                        ->with('success','Vendor deleted successfully');
    }
}
