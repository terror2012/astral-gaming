<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_info', function(Blueprint $t) {
            $t->increments('id');
            $t->string('name');
            $t->string('email')->unique();
            $t->integer('AccountRank');   //1->Administrator, 2->Moderator, 3->Normal User, 4->Banned
            $t->integer('AccountType');   //0->Not Set, 1->Buyer, 2->Seller
            $t->integer('AccountLevel');  //0->Not Set, 1->Default After Setting up, no current leveling up
            $t->integer('MoneySpent');
            $t->integer('MoneyPaid');
            $t->integer('ComissionPaid');
            $t->integer('CurrentBalance');
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
        Schema::drop('user_info');
    }
}
