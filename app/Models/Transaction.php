<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';

    public function hasTrxDetail()
    {
        return $this->hasMany(TransactionDetail::class, 'transaction_id', 'id');
    }
}
