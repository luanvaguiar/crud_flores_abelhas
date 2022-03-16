<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flores', function (Blueprint $table) {
            $table->bigIncrements('id_flor');
            $table->String('nome_flor');
            $table->String('especie_flor');
            $table->String('descricao');
            $table->String('meses');
            $table->String('foto_flor');
            $table->String('abelhas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flores');
    }
}
