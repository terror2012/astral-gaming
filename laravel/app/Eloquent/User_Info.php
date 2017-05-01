<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class User_Info extends Model
{
    public $timestamps = true;
    protected $table = "user_info";
    protected $guarded = ['id'];
}
