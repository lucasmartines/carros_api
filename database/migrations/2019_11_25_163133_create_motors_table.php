<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motors', function (Blueprint $table) {
            $table->bigIncrements('id');
                

            $table->string('nome');
            $table->string('cilindos')->nullable();
            $table->string('cilindrada')->nullable();
            $table->string('rpm')->nullable();
            $table->string('cv')->nullable();
            $table->string('torque')->nullable();
            $table->string('aspiracao')->nullable();

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
        Schema::dropIfExists('motors');
    }
}
