<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'image', 'position', 'status', 'banner_title', 'shop_link',
    ];
}
