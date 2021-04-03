<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id', 'amount', 'received_date', 'details', 'project_id'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
