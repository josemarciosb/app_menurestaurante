<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarmitexesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marmitexes', function (Blueprint $table) {
            $table->id();
            $table->string('size');
            $table->double('price');
            $table->integer('qtd_guarnicao');
            $table->integer('qtd_massa');
            $table->integer('qtd_carne');
            $table->integer('qtd_acompanhamento');
            $table->integer('qtd_salada');
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
        Schema::dropIfExists('marmitexes');
    }
}
