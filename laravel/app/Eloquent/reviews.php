<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class reviews extends Model
{
    public $timestamps = true;
    protected $table = 'reviews';
    protected $guarded = ['id'];
}
