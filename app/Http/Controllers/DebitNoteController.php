<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DebitNote;

use App\Models\Vendor;
use App\Models\Customer;
use App\Models\Loan;
use App\Models\LoanRepayment;
use App\Models\User;
use App\Notifications\NewExpense;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

class DebitNoteController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:debit_note-list|debit_note-create|debit_note-edit|debit_note-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:debit_note-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:debit_note-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:debit_note-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $debit_notes = DebitNote::with(['vendor', 'user'])->with('order')->latest()->paginate(10);
        return view('dashboard.debit_note.index', compact('debit_notes'))
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

        return view('dashboard.debit_note.create', compact('customers', 'vendors', 'users', 'orders', 'loans'));
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
            'amount' => 'required',

        ]);

        $types = $request->input('type');
        //  dd($request->photos);
        foreach ($types as $key => $type) {
            $debit_note = new DebitNote();
            $debit_note->createdby_user_id = $request->user()->id;
            $debit_note->type = $request->input('type')[$key];

            if ($request->input('type')[$key] == "general_expense" && $request->hasFile('photos')) {
                $debit_note->user_id = isset($request->input('entity_id')[$key]) ? $request->input('entity_id')[$key] : null;
            } else if ($request->input('type')[$key] == "vendor_payment" && $request->hasFile('photos')) {
                $debit_note->vendor_id = isset($request->input('entity_id')[$key]) ? $request->input('entity_id')[$key] : null;
            } else if ($request->input('type')[$key] == "refunds" && $request->hasFile('photos')) {
                $debit_note->customer_id = isset($request->input('entity_id')[$key]) ? $request->input('entity_id')[$key] : null;
            }

            /*$expense->user_id = isset($request->input('user_id')[$key]) ? $request->input('user_id')[$key] : null;
    		    $expense->vendor_id = isset($request->input('vendor_id')[$key]) ? $request->input('vendor_id')[$key] : null;
    		    $expense->customer_id = isset($request->input('customer_id')[$key]) ? $request->input('customer_id')[$key] : null;*/
            $debit_note->amount = $request->input('amount')[$key];
            $debit_note->details = $request->input('details')[$key];


            // if($request->hasFile('photos')){
            //     //         // dd($request->photos);

            //         }

            $debit_note->project_id = get_project_id();
            $debit_note->save();
            $user = User::find(1);
        }

        return redirect()->route('debit_note.index')
            ->with('success', 'Debit Note created successfully.');
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
    public function show(DebitNote $debit_note)
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
        return view('dashboard.debit_note.show', compact('customers', 'loans', 'vendors', 'users', 'orders', 'debit_note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DebitNote $debit_note)
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
        return view('dashboard.debit_note.edit', compact('loans', 'debit_note', 'customers', 'vendors', 'users', 'orders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DebitNote $debit_note)
    {
        request()->validate([
            'type' => 'required',
            'amount' => 'required'
        ]);

        $debit_note->update(request()->except(['_method', '_token', 'action']));

        return redirect()->route('debit_note.index')
            ->with('success', 'Debit Notes updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DebitNote $debit_note)
    {
        $debit_note->delete();

        return redirect()->route('debit_note.index')
            ->with('success', 'Debit Note deleted successfully');
    }

    public function AddToLoanRepayment($loan_id, $amount, $expense_id, $repayment_date)
    {
        LoanRepayment::create([
            'loan_id' => $loan_id,
            'amount' => $amount,
            'repayment_date' => $repayment_date,
            'details' => 'Automatically created by expense #' . $expense_id,
            'project_id' => get_project_id()
        ]);
    }
}
