<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutomovelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('automovel', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('filial_id')->unsigned();
            $table->string('nome',150);
            $table->integer('ano');
            $table->string('modelo',150);
            $table->string('cor',50);
            $table->integer('chassi');
            $table->string('categoria',150);
            $table->timestamps();

            $table->foreign('filial_id')->references('id')->on('filial');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('automovel');
    }
}
