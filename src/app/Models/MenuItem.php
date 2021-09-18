<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    CONST DEFAULT_IMAGE = 'images/menu-item-default-image.jpg';
    CONST DEFAULT_MENU_ITEM_IMAGE_FOLDER = 'images/menu-item-images/';

    protected $fillable = [
        'name',
        'description',
        'price',
        'image_url',
    ];

    public function getImageAttribute()
    {
        if ($this->image_url) {
            return url($this->image_url);
        }

        return url(self::DEFAULT_IMAGE);
    }
}