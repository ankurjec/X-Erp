<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Expense;
use App\Models\PaymentsReceived;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'name', 'detail', 'order_status', 'order_complete_flag', 'project_id'
    ];
    
    public function getTotalReceivedAttribute()
    {
        return PaymentsReceived::where('order_id',$this->id)
                        ->sum('amount');
    }
    
    public function getTotalExpenseAttribute()
    {
        return Expense::where('order_id',$this->id)
                        ->sum('amount');
    }
    
    public function getBalanceAttribute()
    {
        return ($this->total_received - $this->total_expense);
    }
}
