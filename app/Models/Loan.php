<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loan extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'vendor_id', 'amount', 'received_date', 'details', 'project_id'
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
