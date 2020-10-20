<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransacoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('valor');
            $table->unsignedInteger('tipo_transacao_id');
            $table->unsignedBigInteger('conta_id');
            $table->foreign('tipo_transacao_id')->references('id')->on('tipos_transacoes');
            $table->foreign('conta_id')->references('id')->on('contas');
            $table->timestamps();
            $table->softDeletes();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transacoes');
    }
}
