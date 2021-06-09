<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->string('title')->nullable();
            $table->integer('user_id')->unsigned();
            // $table->integer('video_category_id')->unsigned();
            // $table->integer('category_id')->unsigned();
            $table->bigInteger('views')->default(0);
            $table->boolean('published')->unsigned()->default(false);
            $table->integer('exposure')->unsigned()->default(10);
            $table->bigInteger('daily_limit')->unsigned()->nullable();
            // $table->enum('receive_views_from', ['male', 'female', 'both'])->default('both');
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
        Schema::dropIfExists('videos');
    }
}
