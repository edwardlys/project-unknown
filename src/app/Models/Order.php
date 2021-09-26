<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;
use App\Models\Payment;

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
        'delivery_address',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function getStatusTextAttribute()
    {
        switch ($this->status) {
            case 0:
                return 'Pending';
                break;
            case 1:
                return 'Completed';
                break;
            default:
                return 'Pending';
                break;
        }
    }
}