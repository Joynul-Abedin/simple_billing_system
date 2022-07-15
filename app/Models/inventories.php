<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventories extends Model
{
    use HasFactory;

    protected $fillabele = [
        'date',
        'billNo',
        'customerId',
        'totalDiscount',
        'totalBillamount',
        'dueAmount',
        'paidAmount',
    ];
}