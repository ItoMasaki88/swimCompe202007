<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->integer('style');         //free brest back fly medley
            $table->integer('distance');      //50 100 200
            $table->integer('sex');           //male, female, (mix)
            $table->integer('age');           //elemaentary, jouniorhigh, high, adult, over30, over50
            $table->boolean('playerType');    //individual, group
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
