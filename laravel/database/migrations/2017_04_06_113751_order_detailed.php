<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderDetailed extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detailed', function(Blueprint $t){
           $t->increments('id');
            $t->integer('order_id');
            $t->string('email');
            $t->integer('product_code');
            $t->string('product_name');
            $t->string('price');
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_detailed');
    }
}
