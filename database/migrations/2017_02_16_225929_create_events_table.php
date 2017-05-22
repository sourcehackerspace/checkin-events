<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('summary');
            $table->text('description');
            $table->string('address');
            $table->boolean('isfree')->default(true);
            $table->integer('cost')->default(0);
            $table->enum('payment',['oxxo'])->default('oxxo');
            $table->date('date');
            $table->time('time');
            $table->string('image')->nullable();
            $table->integer('quota'); //total de lugares
            $table->integer('busy')->default(0); //lugares ocupados
            $table->integer('remaining'); //lugares restantes
            $table->integer('topic_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->integer('owner_id')->unsigned();
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('topic_id')->references('id')->on('topics');
            $table->foreign('owner_id')->references('id')->on('users');
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
