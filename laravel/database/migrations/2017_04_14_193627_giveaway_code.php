<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GiveawayCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giveaway_code', function(Blueprint $t)
        {
           $t->increments('id');
            $t->string('game_id')->nullable();
            $t->string('game_name');
            $t->string('game_code');
            $t->integer('active');
            $t->timestamp('activated_at');
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
        Schema::drop('giveaway_code');
    }
}
