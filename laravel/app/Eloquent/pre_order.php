<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class pre_order extends Model
{
    public $timestamps = true;
    protected $table = 'pre_orders';
    protected $guarded = ['id'];
}
