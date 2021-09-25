<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    /**
     * Order pending means user has checked out and payment
     * has been made
     */
    public const STATUS_PENDING = 0;

    /**
     * Order complete is when goods has been delivered to
     * the customer
     */
    public const STATUS_COMPLETED = 1;

    protected $fillable = [
        'user_id',
        'status',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}