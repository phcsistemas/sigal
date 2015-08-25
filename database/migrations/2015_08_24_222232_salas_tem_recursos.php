<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SalasTemRecursos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salas_tem_recursos', function (Blueprint $table) {
            $table->integer('sala_id')->unsigned();
            $table->foreign('sala_id')->references('id')->on('salas');

            $table->integer('recurso_id')->unsigned();
            $table->foreign('recurso_id')->references('id')->on('recursos');

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
        Schema::dropIfExists('salas_tem_recursos');
    }
}
