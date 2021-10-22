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
            'detail' => 'required'
        ]);
    
        $path = '';
        if($request->hasFile('photos')){
            // dd($request->photos);
   
            $path = $request->file('photos')->store('uploads');

       //return $path;
        }
        Vendor::create(['name' => request()->name,'detail'=> request()->detail, 'filename'=> $path,'project_id'=> request()->project_id ]);
        return redirect()->route('vendors.index')
                        ->with('success','Vendor created successfully.');
    }
    
//     public function store(Request $req){
//         $req->validate([
//             'name' => 'required',
//            'detail' => 'required',
//         'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
//         ]);

//         $vendorModel = new File;

//         if($req->file()) {
//             $fileName = time().'_'.$req->file->getClientOriginalName();
//             $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

//             $vendorModel->name = time().'_'.$req->file->getClientOriginalName();
//             $vendorModel->file_path = '/storage/' . $filePath;
//             $vendorModel->save();

//             return back()
//             ->with('success','File has been uploaded.')
//             ->with('file', $fileName);
//         }
//    }


    
    
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
            'detail' => 'required'

        ]);
    
    //     $vendor->update($request->all());
    
    //     return redirect()->route('vendors.index')
    //                     ->with('success','Vendor updated successfully');
    // }

    $path = '';
    if($request->hasFile('photos')){
        // dd($request->photos);

        $path = $request->file('photos')->store('uploads');

   //return $path;
    }
    $vendor->update(['name' => request()->name,'detail'=> request()->detail, 'filename'=> $path ]);
    return redirect()->route('vendors.index')
                    ->with('success','Vendor Updated successfully.');
}
    
    
    public function destroy(Vendor $vendor)
    {
        $vendor->delete();
    
        return redirect()->route('vendors.index')
                        ->with('success','Vendor deleted successfully');
    }
}
