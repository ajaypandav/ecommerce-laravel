<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title', 'author', 'short_description', 'description', 'image', 'status', 'url',
    ];
}
