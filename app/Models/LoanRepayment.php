<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoanRepayment extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'loan_repayment';
    
    protected $fillable = [
        'loan_id', 'amount', 'repayment_date', 'details', 'project_id', 'filename'
    ];
    protected $with = ['loan'];

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}
