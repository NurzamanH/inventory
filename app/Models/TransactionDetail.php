<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $table = 'transaction_detail';

    public function hasProduct()
    {
        return $this->belongsto(Inventory::class, 'product_id', 'id');
    }
}