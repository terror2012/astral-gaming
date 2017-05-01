<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductListDetailed extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_list_detailed', function(Blueprint $t) {
            $t->increments('id');
            $t->string('product_name');
            $t->integer('SKU')->unique();
            $t->longText('product_description');
            $t->integer('product_code')->unique();
            $t->string('rating')->default('0');
            $t->string('picture_main');
            $t->string('pictures');
            $t->string('trailer');
            $t->string('gameplay');
            $t->string('category');
            $t->string('tags');
            $t->float('ratings');
            $t->integer('price');
            $t->integer('sales')->default("0");
            $t->integer('isDiscountOn');
            $t->integer('discountPrice');
            $t->integer('isFeaturedOn');
            $t->integer('isPercentage');
            //Sys Req
            $t->string('os');
            $t->string('cpu');
            $t->string('memory');
            $t->string('gpu');
            $t->string('directX');
            $t->string('network');
            $t->string('HDD');
            $t->string('sound_card');
            //End Sys Req
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
        Schema::drop('product_list_detailed');
    }
}
