<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Product_list extends Model
{
    public $timestamps = true;
    protected $table = "product_list";
    protected $guarded = ['id'];
}
