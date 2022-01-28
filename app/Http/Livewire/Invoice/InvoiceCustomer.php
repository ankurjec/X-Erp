<?php

namespace App\Http\Livewire\Invoice;

use Livewire\Component;
use App\Models\Customer;

class InvoiceCustomer extends Component
{
    public $customer;

    public function get_customer($customer_id) {
        $this->customer = Customer::find($customer_id);
    }
    public function render()
    {
        return view('livewire.invoice.invoice-customer',[
            'customer' => $this->customer,
            'customers' => Customer::all()
        ]);
    }
}
