<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'firstname', 'middlename', 'lastname', 'email', 'password',
    ];
}
