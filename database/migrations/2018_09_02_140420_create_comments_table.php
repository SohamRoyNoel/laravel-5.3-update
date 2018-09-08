<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{

    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned()->index();;
            $table->integer('is_active')->default();
            $table->string('author');
            $table->string('email');
            $table->text('body');
            $table->string('photo_id');
            $table->timestamps();


            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::drop('comments');
    }
}
