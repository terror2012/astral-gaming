<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlogNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_news', function(Blueprint $t){
            $t->increments('id');
            $t->string('title');
            $t->string('author_name');
            $t->string('author_id');
            $t->string('message'); //This is a html unescaped version.
            $t->string('category');
            $t->string('category_id');
            $t->integer('viewers')->default('0');
            $t->integer('likes')->default('0');
            $t->string('tags');
            $t->string('thumbnail');
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
        Schema::drop('blog_news');
    }
}
