<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PreOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_orders', function(Blueprint $t){
           $t->increments('id');
            $t->string('name');
            $t->timestamp('released_at');
            $t->string('price');
            $t->string('background');
            $t->integer('expired')->default('0'); //0->active, 1->expired
            $t->integer('featured')->default('0'); //0->not featured, 1-> featured
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
        Schema::drop('pre_orders');
    }
}
