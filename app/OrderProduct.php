<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $guarded = ['restaurant_id', 'image'];
    
    protected $table = 'order_product';

}
