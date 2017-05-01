<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class giveaway_code extends Model
{
    public $timestamps = true;
    protected $table = 'giveaway_code';
    protected $guarded = ['id'];
}
