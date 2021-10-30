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
        'additional_ratings',
        'message',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFriendlinessOfStaffAttribute()
    {
        if (!empty($this->additional_ratings)) {
            $additionalRatings = json_decode($this->additional_ratings, true);
            
            if (!empty($additionalRatings['friendliness_of_staff'])) {
                return $additionalRatings['friendliness_of_staff'];
            }
        } 

        return 0;
    }

    public function getQualityOfFoodAttribute()
    {
        if (!empty($this->additional_ratings)) {
            $additionalRatings = json_decode($this->additional_ratings, true);
            
            if (!empty($additionalRatings['quality_of_food'])) {
                return $additionalRatings['quality_of_food'];
            }
        } 

        return 0;
    }

    public function getValueForMoneyAttribute()
    {
        if (!empty($this->additional_ratings)) {
            $additionalRatings = json_decode($this->additional_ratings, true);
            
            if (!empty($additionalRatings['value_for_money'])) {
                return $additionalRatings['value_for_money'];
            }
        } 

        return 0;
    }
}