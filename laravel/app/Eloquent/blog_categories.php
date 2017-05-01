<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class blog_categories extends Model
{
    public $timestamps = true;
    protected $table = 'blog_categories';
    protected $guarded = ['id'];
}
