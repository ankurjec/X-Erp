<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    
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
}
