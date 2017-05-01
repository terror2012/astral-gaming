<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class invoices extends Model
{
    public $timestamps = true;
    protected $table = 'invoice_history';
    protected $guarded = ['id'];
}
