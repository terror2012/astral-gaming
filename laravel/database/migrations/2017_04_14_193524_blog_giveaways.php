<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlogGiveaways extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_giveaway', function(Blueprint $t)
        {
           $t->increments('id');
            $t->string('name');
            $t->string('author_id');
            $t->string('author_name');
            $t->string('game_name');
            $t->string('game_product_id')->nullable();
            $t->string('game_key_id');
            $t->string('platform');
            $t->string('message');
            $t->integer('views')->default('0');
            $t->integer('participants');
            $t->string('tags');
            $t->string('thumbnail');
            $t->string('giveaway_id')->default('0'); //0 for unable to participate
            $t->timestamp('ending_at');
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
        Schema::drop('blog_giveaway');
    }
}
