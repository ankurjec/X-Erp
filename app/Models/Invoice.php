<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function company()
    {
        return $this->hasOne(CompanyDetail::class,'invoice_id')->withDefault();
    }

     public function items()
    {
        return $this->hasMany(Item::class,'invoice_id');
    }
}
