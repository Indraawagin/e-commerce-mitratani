<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'transactions_id',
        'products_id',
        'price',
        'date_sent',
        'shipping_status',
        'resi',
        'code',
        'qty'
    ];


    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'id', 'transactions_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'products_id');
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];
}
