<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'expense_ids', 'amount', 'paid_to_name', 'paid_entity', 'user_id', 'vendor_id', 'customer_id', 'payment_date', 'reference_no', 'details', 'project_id'
    ];
    
    protected $casts = [
        'expense_ids' => 'array',
        'payment_date' => 'datetime'
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
}
