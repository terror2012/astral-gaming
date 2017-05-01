<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public $timestamps;
    protected $table = 'categories';
    protected $guarded = ['id'];
}
