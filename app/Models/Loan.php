<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'amount', 'received_date', 'details', 'project_id', 'filename',
    ];

    protected $with = ['user'];

    public function user()
    {
        return $this->loan_repayments()->sum('amount');
    }
}
