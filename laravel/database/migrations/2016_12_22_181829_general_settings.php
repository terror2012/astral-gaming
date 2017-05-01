<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GeneralSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function(Blueprint $t) {
            $t->increments('id');
            $t->string('owner_name')->nullable();
            $t->string('main_slider_name')->nullable();
            $t->string('main_product_name')->nullable();
            $t->string('main_slider_path')->nullable();
            $t->string('main_slider_caption')->nullable();
            $t->integer('main_slider_product_id')->nullable();
            $t->string('address')->nullable();
            $t->integer('phone')->nullable();
            $t->string('email')->nullable();
            //Google Maps
            $t->float('long')->nullable();
            $t->float('lat')->nullable();
            //End Google Maps
            //Socials
            $t->string('facebook')->nullable();
            $t->string('twitter')->nullable();
            $t->string('youtube')->nullable();
            $t->string('twitch')->nullable();
            //End Socials
            $t->string('Bg_image')->nullable();
            $t->string('WebSite_Name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('general_settings');
    }
}
