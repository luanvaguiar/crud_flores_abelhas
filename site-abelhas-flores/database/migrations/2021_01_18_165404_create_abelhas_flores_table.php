<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbelhasFloresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abelhas_flores', function (Blueprint $table) {
            $table->bigIncrements('id_abelhas_flores');
            $table->unsignedBigInteger('id_flor');
            $table->unsignedBigInteger('id_abelha');

            $table->foreign('id_flor')->references('id_flor')->on('flores');
            $table->foreign('id_abelha')->references('id_abelha')->on('abelhas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abelhas_flores');
    }
}
