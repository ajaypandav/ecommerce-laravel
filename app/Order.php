<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_id', 'cid', 'firstname', 'lastname', 'email', 'mobileno', 'address1', 'address2', 'zipcode', 'city', 'state', 'country', 'checkout_as', 'payment_method', 'comment',
    ];
}
