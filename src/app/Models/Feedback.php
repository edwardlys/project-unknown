<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Feedback extends Model
{
    protected $table = 'feedbacks';

    protected $fillable = [
        'name',
        'email',
        'rating',
        'message',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}