<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('subtitle');
            $table->text('description');
            $table->string('address');
            $table->boolean('free')->default(true);
            $table->integer('cost')->default(0);
            $table->enum('payment',['oxxo'])->default('oxxo');
            $table->date('date');
            $table->time('time');
            $table->string('image')->nullable();
            $table->integer('quota'); //total de lugares
            $table->integer('busy')->default(0); //lugares ocupados
            $table->integer('remaining'); //lugares restantes
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
        Schema::dropIfExists('courses');
    }
}
