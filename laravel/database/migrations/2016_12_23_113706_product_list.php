<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_list', function(Blueprint $t) {
            $t->increments('id');
            $t->string('product_name');
            $t->integer('SKU')->unique();
            $t->integer('product_code')->unique();
            $t->string('rating')->default('0');
            $t->string('product_image');
            $t->string('product_image_feature');
            $t->string('category');
            $t->integer('sales')->default("0");
            $t->string('tags');
            $t->integer('price');
            $t->integer('isDiscountOn');
            $t->integer('discountPrice');
            $t->integer('isFeaturedOn');
            $t->integer('isPercentage');
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
        Schema:drop('product_list');
    }
}
