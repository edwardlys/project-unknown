<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'order_id',
        'amount',
        'cc_name',
        'cc_masked_pan',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}