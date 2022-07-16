<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventories extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'billNo',
        'customerId',
        'totalDiscount',
        'totalBillamount',
        'dueAmount',
        'paidAmount',
    ];


    public function customer()
    {
        return $this->hasMany(customer::class);
    }
}