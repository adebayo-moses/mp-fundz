<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contests', function (Blueprint $table) {
            $table->id();
            // $table->string('name');
            $table->date('date');
            $table->time('start_time')->nullable()->default(NULL);
            $table->time('end_time')->nullable()->default(NULL);
            $table->text('winners')->nullable();
            $table->boolean('publish')->default(1);
            $table->boolean('activate_payment')->default(0);
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
        Schema::dropIfExists('contests');
    }
}
