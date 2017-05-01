<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class blog_news extends Model
{
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $table = 'blog_news';
}
