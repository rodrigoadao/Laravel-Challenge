<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('filial_id')->unsigned();
            $table->string('nome',150);
            $table->string('endereco',150);
            $table->date('dtNacimento');
            $table->boolean('sexo');
            $table->string('cpf',50);
            $table->string('cargo',150);
            $table->integer('salario');
            $table->boolean('situacao');
            $table->rememberToken();
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
        Schema::dropIfExists('funcionario');
    }
}
