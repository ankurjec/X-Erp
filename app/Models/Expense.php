<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment;

class Expense extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'type', 'entity_type', 'user_id', 'vendor_id', 'customer_id', 'employee_id', 'amount', 'details', 'project_id', 'createdby_user_id', 'paid_flag', 'order_id'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
    
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
    public function getTypeStringAttribute()
    {
        if($this->type == 'general_expense') {
	        return "General Expense";
	    }elseif($this->type == 'vendor_payment') {
	        return "Vendor Payment";
	    }elseif($this->type == 'refunds') {
	        return "Refunds";
	    }
    }
    
    public function getTotalPaidAttribute()
    {
        return Payment::where('expense_ids','like','%"'.$this->id.'"%')
                        ->sum('amount');
    }
}
