<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InvoiceHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_history', function(Blueprint $t){
           $t->increments('id');
            $t->string('user_id');
            $t->string('products_code');
            $t->string('price');
            $t->string('team_purchase')->default('0'); //0->single user purchase, 1->team purchase
            $t->string('team_product')->nullable();
            $t->string('team_price')->nullable();
            $t->string('feedback')->default('0'); //0->not left, 1->left
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
        Schema::drop('invoice_history');
    }
}
