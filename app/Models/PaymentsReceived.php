<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentsReceived extends Model
{
    use HasFactory;
    
    protected $table = 'payments_received';
    
    protected $fillable = [
        'from', 'customer_id', 'received_date', 'mode', 'amount', 'cgst_amount', 'sgst_amount', 'igst_amount', 'details', 'reference_no', 'invoice_no', 'gst_no', 'place_of_supply', 'full_partial_advance', 'project_id', 'order_id'
    ];
    
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
