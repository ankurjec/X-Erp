<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\User;

class LoanController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:loan-list|loan-create|loan-edit|loan-delete', ['only' => ['index','show']]);
         $this->middleware('permission:loan-create', ['only' => ['create','store']]);
         $this->middleware('permission:loan-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:loan-delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = Loan::latest()->paginate(5);
        return view('dashboard.loans.index',compact('loans'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('dashboard.loans.create',compact('users'));
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
            'user_id' => 'required',
            'amount' => 'required',
        ]);
        
        Loan::create($request->all());
    
        return redirect()->route('loans.index')
                        ->with('success','Loan created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
        return view('dashboard.loans.show',compact('loan'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        $users = User::all();
        return view('dashboard.loans.edit',compact('loan','users'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loan $loan)
    {
         request()->validate([
            'user_id' => 'required',
            'amount' => 'required',
        ]);
    
        $loan->update($request->all());
    
        return redirect()->route('loans.index')
                        ->with('success','Loan updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        $loan->delete();
    
        return redirect()->route('loans.index')
                        ->with('success','Loan deleted successfully');
    }
}
