<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = [
        'pid', 'cid',
    ];

    protected $table = 'wishlist';
}
