<?php

namespace App\Http\Controllers;

use App\Models\Item;
use DB;

use App\Models\Invoice;
use Illuminate\Http\Request;

use App\Models\CompanyDetail;
use App\Models\Vendor;
use App\Models\Customer;

class InvoiceController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:invoice-list|invoice-create|invoice-edit|invoice-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:invoice-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:invoice-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:invoice-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.invoices.index');
    }

    public function create()
    {
        return view('dashboard.invoices.create');
    }

    public function store(Request $request)
    {
        //dd($request);

        $request->validate([
            'invoice_no' => 'required',
            'invoice_date' => 'required'
        ]);



        //Product::create($request->all());
        $invoice = new Invoice();
        $invoice->invoice_no = $request->invoice_no;
        $invoice->invoice_date = $request->invoice_date;
        $invoice->invoice_terms = $request->invoice_terms;
        $invoice->total_amount = $request->total_amount;
        $invoice->paid_amount = $request->paid_amount;
        $invoice->name = $request->company_name;
        $invoice->detail = $request->company_details;
        //dd($request->customer_id);

        $invoice->address = $request->company_address;
        $invoice->gst = $request->gst_no;
        $invoice->save();

        $CompanyDetail = new CompanyDetail;
        $CompanyDetail->invoice_id = $invoice->id;
        $CompanyDetail->company_name = $request->company_name;
        $CompanyDetail->company_details = $request->company_details;
        $CompanyDetail->company_address = $request->company_address;
        $CompanyDetail->gst_no = $request->gst_no;
        $CompanyDetail->save();

        // dd($request->item_name);
        foreach ($request->item_name as $key => $item) {
            $Items = new Item;
            $Items->invoice_id = $invoice->id;
            $Items->customer_id = $request->customer_id;

            $Items->item_name = $request->item_name[$key];
            $Items->description = $request->item_description[$key];
            $Items->rate = $request->item_rate[$key];
            $Items->quantity = $request->item_quantity[$key];
            $Items->save();
        }


        return redirect()->back()->with('success', 'Invoice created successfully.');

        // route('invoice.index')

        // ->with('success','Invoice created successfully.');

    }

    public function show($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('dashboard.invoices.show', ['invoice' => $invoice]);
    }

    public function show_invoices()
    {
        //  $items = DB::select('select * from items');
        $items = Item::all();

        return view('invoice/all_invoices', ['items' => $items]);
    }

    public function show_particular_invoice($id)
    {

        // $item = DB::table('select item_name, description from items where id="'.$id.'"');
        $item = Item::findOrFail($id);
        return view('invoice/particular_invoice', compact('item'));
    }
}
