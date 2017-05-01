<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class blog_giveaway extends Model
{
    public $timestamps = true;
    protected $table = 'blog_giveaway';
    protected $guarded = ['id'];
}
