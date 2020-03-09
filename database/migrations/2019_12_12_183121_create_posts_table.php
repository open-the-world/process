<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('user_id')->unsigned()->nullable();
          $table->foreign('user_id')->references('id')->on('users');
          $table->string('title', 50);
          $table->text('category');
          $table->text('beginner');
          $table->text('intermediate');
          $table->text('advanced');
          $table->text('image');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
