<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_id', 'cid', 'product_name', 'stock', 'price', 'tag_line', 'description', 'status', 'is_featured', 'url',
    ];
}
