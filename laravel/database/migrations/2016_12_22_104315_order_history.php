<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_history', function(Blueprint $t) {
            $t->increments('id');
            $t->string('email');
            $t->string('name');
            $t->string('products_code');
            $t->string('ammounts_paid');
            $t->integer('total_paid');
            $t->integer('comission_paid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_history');
    }
}
