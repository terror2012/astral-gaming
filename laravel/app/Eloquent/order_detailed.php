<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class order_detailed extends Model
{
    public $timestamps = true;
    protected $table = 'order_detailed';
    protected $guarded = ['id'];
}
