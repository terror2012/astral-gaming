<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Product_list_detailed extends Model
{
    public $timestamps = true;
    protected $table = "product_list_detailed";
    protected $guarded = ['id'];
}
