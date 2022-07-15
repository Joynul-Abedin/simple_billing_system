<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventory_products extends Model
{
    use HasFactory;

    protected $fillabale = [
        'inventoryId',
        'productId',
        'rate',
        'qty',
        'discount',
    ];


    public function inventory()
    {
        return $this->hasOne(inventories::class);
    }

    public function product()
    {
        return $this->hasMany(products::class);
    }
}