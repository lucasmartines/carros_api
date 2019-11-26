<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carros', function (Blueprint $table) {

            $table->bigIncrements('id');
            /* dados do carro */
            $table->string('nome');
            $table->date('fabricacao')->nullable();
            $table->decimal('preco',8,2)->nullable();
            $table->text('resumo')->nullable();

                        /*marca do carro*/
            $table->integer('marca_id')->nullable();

            $table->foreign('marca_id')->references('id')
                ->on('marcas')
                ->onDelete('cascade');


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
        Schema::dropIfExists('carros');
    }
}
