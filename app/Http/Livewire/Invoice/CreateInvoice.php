<?php

namespace App\Http\Livewire\Invoice;

use App\Models\Customer;
use Livewire\Component;

class CreateInvoice extends Component
{
    public $cust;
    public $custid;

    public function updatedCustid(){
        $this->cust = Customer::find($this->custid);
    }
    public function render()
    {
        return view('livewire.invoice.create-invoice',[
            'customers' => Customer::select('id','name','detail')->get()
        ]);
    }
}
