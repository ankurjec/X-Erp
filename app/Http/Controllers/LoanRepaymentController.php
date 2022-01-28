<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoanRepayment;
use App\Models\Loan;

class LoanRepaymentController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:loan-repayment-list|loan-repayment-create|loan-repayment-edit|loan-repayment-delete', ['only' => ['index','show']]);
         $this->middleware('permission:loan-repayment-create', ['only' => ['create','store']]);
         $this->middleware('permission:loan-repayment-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:loan-repayment-delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loan_repayments = LoanRepayment::with('loan')->latest()->paginate(5);
        return view('dashboard.loan_repayments.index',compact('loan_repayments'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loans = Loan::all();
        return view('dashboard.loan_repayments.create',compact('loans'));
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
            'loan_id' => 'required',
            'amount' => 'required',
        ]);
        
    //     LoanRepayment::create($request->all());
    
    //     return redirect()->route('loan_repayments.index')
    //                     ->with('success','LoanRepayment Repayment created successfully.');
    // }

 
    if($request->hasFile('photos')){
        // dd($request->photos);
        $paths = '';
        foreach($request->photos as $photo){
            $path = $photo->store('uploads/loan_repayment');
            if(!$paths){
                $paths = $path;
            }else{
                $paths = $paths.','.$path;
            }
        }

 //  return $path;
    }
    LoanRepayment::create(['loan_id' => request()->loan_id,'amount'=> request()->amount, 'filename'=> $paths,'project_id'=> request()->project_id ]);
    return redirect()->route('loan_repayments.index')
                    ->with('success','Vendor created successfully.');
}



    
    /**
     * Display the specified resource.
     *
     * @param  \App\LoanRepayment  $loan_repayment
     * @return \Illuminate\Http\Response
     */
    public function show(LoanRepayment $loan_repayment)
    {
        return view('dashboard.loan_repayments.show',compact('loan_repayment'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LoanRepayment  $loan_repayment
     * @return \Illuminate\Http\Response
     */
    public function edit(LoanRepayment $loan_repayment)
    {
        $loans = Loan::all();
        return view('dashboard.loan_repayments.edit',compact('loan_repayment','loans'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LoanRepayment  $loan_repayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoanRepayment $loan_repayment)
    {
         request()->validate([
            'loan_id' => 'required',
            'amount' => 'required',
        ]);
    
        $loan_repayment->update($request->all());
    
        return redirect()->route('loan_repayments.index')
                        ->with('success','Loan Repayment updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LoanRepayment  $loan_repayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoanRepayment $loan_repayment)
    {
        $loan_repayment->delete();
    
        return redirect()->route('loan_repayments.index')
                        ->with('success','Loan Repayment deleted successfully');
    }
}
