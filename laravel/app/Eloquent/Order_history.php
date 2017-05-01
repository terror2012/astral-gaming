<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Order_history extends Model
{
    public $timestamps = true;
    protected $table = "order_history";
    protected $guarded = ['id'];
}
